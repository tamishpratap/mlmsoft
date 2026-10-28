<?php

namespace App\Support;

use Illuminate\Support\Str;

class BlogContentFormatter
{
    public static function format(?string $title, ?string $content, array $imageUrls = []): array
    {
        $normalizedTitle = self::normalizeInlineText($title ?? '');
        $tokens = self::tokenize($content ?? '', $normalizedTitle);
        $sections = self::buildSections($tokens);
        $sections = self::injectImages(
            $sections,
            collect($imageUrls)->filter()->unique()->values()->all(),
            $normalizedTitle
        );

        return [
            'lead' => self::extractLead($sections)
                ?? Str::limit(self::normalizeInlineText(self::normalizeRawText($content ?? '')), 190),
            'sections' => $sections,
        ];
    }

    private static function tokenize(string $content, string $normalizedTitle): array
    {
        $lines = preg_split('/\n/', self::normalizeRawText($content));
        $tokens = [];
        $paragraphBuffer = [];
        $listBuffer = [];
        $currentSectionStarted = false;

        $flushParagraph = function () use (&$paragraphBuffer, &$tokens): void {
            if ($paragraphBuffer === []) {
                return;
            }

            $text = self::normalizeInlineText(implode(' ', $paragraphBuffer));

            if ($text !== '') {
                $tokens[] = ['type' => 'paragraph', 'text' => $text];
            }

            $paragraphBuffer = [];
        };

        $flushList = function () use (&$listBuffer, &$tokens): void {
            if ($listBuffer === []) {
                return;
            }

            $tokens[] = ['type' => 'list', 'items' => array_values($listBuffer)];
            $listBuffer = [];
        };

        foreach ($lines as $index => $line) {
            $line = self::normalizeInlineText($line);

            if ($line === '') {
                $flushParagraph();
                $flushList();
                continue;
            }

            if (self::isDuplicateTitle($line, $normalizedTitle)) {
                $flushParagraph();
                $flushList();
                continue;
            }

            [$explicitLevel, $explicitHeading] = self::extractExplicitHeading($line, $normalizedTitle);

            if ($explicitLevel !== null && $explicitHeading !== '') {
                $flushParagraph();
                $flushList();
                $tokens[] = ['type' => 'heading', 'level' => $explicitLevel, 'text' => $explicitHeading];
                $currentSectionStarted = $explicitLevel === 'h2';
                continue;
            }

            $listItem = self::extractListItem($line);

            if ($listItem !== null) {
                $flushParagraph();
                $listBuffer[] = $listItem;
                continue;
            }

            $flushList();

            $nextNonEmptyLine = self::nextNonEmptyLine($lines, $index + 1);

            if (self::isHeadingCandidate($line, $normalizedTitle, $nextNonEmptyLine)) {
                $flushParagraph();

                $level = $currentSectionStarted ? 'h3' : 'h2';

                if ($currentSectionStarted && self::looksLikePrimarySectionHeading($line)) {
                    $level = 'h2';
                }

                $tokens[] = ['type' => 'heading', 'level' => $level, 'text' => $line];
                $currentSectionStarted = $level === 'h2';
                continue;
            }

            $paragraphBuffer[] = $line;
        }

        $flushParagraph();
        $flushList();

        return $tokens;
    }

    private static function buildSections(array $tokens): array
    {
        $sections = [];
        $currentSection = null;

        foreach ($tokens as $token) {
            if ($token['type'] === 'heading' && $token['level'] === 'h2') {
                if ($currentSection !== null && $currentSection['blocks'] !== []) {
                    $sections[] = $currentSection;
                }

                $currentSection = [
                    'heading' => $token['text'],
                    'blocks' => [],
                ];

                continue;
            }

            if ($currentSection === null) {
                $currentSection = [
                    'heading' => 'Overview',
                    'blocks' => [],
                ];
            }

            if ($token['type'] === 'heading' && $token['level'] === 'h3') {
                $currentSection['blocks'][] = [
                    'type' => 'subheading',
                    'text' => $token['text'],
                ];

                continue;
            }

            $currentSection['blocks'][] = $token;
        }

        if ($currentSection !== null && $currentSection['blocks'] !== []) {
            $sections[] = $currentSection;
        }

        if ($sections !== []) {
            return $sections;
        }

        return [[
            'heading' => 'Overview',
            'blocks' => [[
                'type' => 'paragraph',
                'text' => 'Content will be available soon.',
            ]],
        ]];
    }

    private static function injectImages(array $sections, array $imageUrls, string $title): array
    {
        if ($imageUrls === []) {
            return $sections;
        }

        $positions = [];
        $totalWeight = 0.0;

        foreach ($sections as $sectionIndex => $section) {
            foreach ($section['blocks'] as $blockIndex => $block) {
                if (!in_array($block['type'], ['paragraph', 'list'], true)) {
                    continue;
                }

                $totalWeight += self::blockWeight($block);
                $positions[] = [
                    'section' => $sectionIndex,
                    'after' => $blockIndex,
                    'weight' => $totalWeight,
                ];
            }
        }

        if ($positions === []) {
            $positions[] = ['section' => 0, 'after' => -1, 'weight' => 1];
            $totalWeight = 1;
        }

        $usedPositions = [];
        $insertions = [];
        $positionCount = count($positions);

        foreach ($imageUrls as $imageIndex => $imageUrl) {
            $targetWeight = $totalWeight * (($imageIndex + 1) / (count($imageUrls) + 1));
            $selectedIndex = null;

            foreach ($positions as $positionIndex => $position) {
                if (in_array($positionIndex, $usedPositions, true)) {
                    continue;
                }

                if ($position['weight'] >= $targetWeight) {
                    $selectedIndex = $positionIndex;
                    break;
                }
            }

            if ($selectedIndex === null) {
                for ($positionIndex = 0; $positionIndex < $positionCount; $positionIndex++) {
                    if (!in_array($positionIndex, $usedPositions, true)) {
                        $selectedIndex = $positionIndex;
                        break;
                    }
                }
            }

            $selectedIndex ??= $positionCount - 1;
            $usedPositions[] = $selectedIndex;
            $position = $positions[$selectedIndex];
            $sectionHeading = $sections[$position['section']]['heading'] ?: 'Overview';

            $insertions[$position['section']][$position['after']][] = [
                'type' => 'image',
                'src' => $imageUrl,
                'alt' => trim($title . ' ' . $sectionHeading . ' illustration'),
                'variant' => $imageIndex % 2 === 0 ? 'feature' : 'standard',
            ];
        }

        foreach ($sections as $sectionIndex => &$section) {
            $rebuiltBlocks = [];

            foreach ($section['blocks'] as $blockIndex => $block) {
                if (isset($insertions[$sectionIndex][-1]) && $blockIndex === 0) {
                    foreach ($insertions[$sectionIndex][-1] as $imageBlock) {
                        $rebuiltBlocks[] = $imageBlock;
                    }
                }

                $rebuiltBlocks[] = $block;

                if (!isset($insertions[$sectionIndex][$blockIndex])) {
                    continue;
                }

                foreach ($insertions[$sectionIndex][$blockIndex] as $imageBlock) {
                    $rebuiltBlocks[] = $imageBlock;
                }
            }

            $section['blocks'] = $rebuiltBlocks;
        }
        unset($section);

        return $sections;
    }

    private static function extractLead(array $sections): ?string
    {
        foreach ($sections as $section) {
            foreach ($section['blocks'] as $block) {
                if ($block['type'] === 'paragraph' && ($block['text'] ?? '') !== '') {
                    return Str::limit($block['text'], 190);
                }
            }
        }

        return null;
    }

    private static function normalizeRawText(string $content): string
    {
        $content = preg_replace('/<br\s*\/?>/i', "\n", $content) ?? $content;
        $content = preg_replace('/<\/(p|div|section|article|h1|h2|h3|h4|h5|h6)>/i', "\n\n", $content) ?? $content;
        $content = preg_replace('/<li[^>]*>/i', "\n- ", $content) ?? $content;
        $content = preg_replace('/<\/(li|ul|ol)>/i', "\n", $content) ?? $content;
        $content = html_entity_decode(strip_tags($content), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $content = str_replace(["\r\n", "\r"], "\n", $content);
        $content = preg_replace("/[ \t]+/", ' ', $content) ?? $content;
        $content = preg_replace("/\n{3,}/", "\n\n", $content) ?? $content;

        return trim($content);
    }

    private static function normalizeInlineText(string $text): string
    {
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = preg_replace('/\s+/u', ' ', $text) ?? $text;

        return trim($text);
    }

    private static function extractExplicitHeading(string $line, string $normalizedTitle): array
    {
        if (!preg_match('/^(#{1,3})\s+(.+)$/', $line, $matches)) {
            return [null, null];
        }

        $heading = self::normalizeInlineText($matches[2]);

        if ($heading === '' || self::isDuplicateTitle($heading, $normalizedTitle)) {
            return [null, null];
        }

        return [strlen($matches[1]) >= 3 ? 'h3' : 'h2', $heading];
    }

    private static function extractListItem(string $line): ?string
    {
        if (!preg_match('/^(?:[-*\x{2022}]|(?:\d+[\.\)]))\s+(.+)$/u', $line, $matches)) {
            return null;
        }

        $item = self::normalizeInlineText($matches[1]);

        return $item !== '' ? $item : null;
    }

    private static function isHeadingCandidate(string $line, string $normalizedTitle, ?string $nextNonEmptyLine): bool
    {
        if ($line === '' || $nextNonEmptyLine === null || self::isDuplicateTitle($line, $normalizedTitle)) {
            return false;
        }

        $wordCount = str_word_count($line);

        if ($wordCount < 2 || $wordCount > 12 || mb_strlen($line) > 90) {
            return false;
        }

        if (preg_match('/[.!?]$/', $line)) {
            return false;
        }

        if (substr_count($line, ',') > 1) {
            return false;
        }

        return preg_match('/[A-Za-z]/', $line) === 1;
    }

    private static function looksLikePrimarySectionHeading(string $line): bool
    {
        return str_word_count($line) >= 4 || preg_match('/:\s*$/', $line) === 1;
    }

    private static function blockWeight(array $block): float
    {
        if ($block['type'] === 'list') {
            return max(1.0, count($block['items']) * 0.75);
        }

        return max(1.0, str_word_count($block['text'] ?? '') / 70);
    }

    private static function nextNonEmptyLine(array $lines, int $startIndex): ?string
    {
        $lineCount = count($lines);

        for ($index = $startIndex; $index < $lineCount; $index++) {
            $candidate = self::normalizeInlineText($lines[$index]);

            if ($candidate !== '') {
                return $candidate;
            }
        }

        return null;
    }

    private static function isDuplicateTitle(string $line, string $normalizedTitle): bool
    {
        return $normalizedTitle !== ''
            && Str::lower(self::normalizeInlineText($line)) === Str::lower($normalizedTitle);
    }
}
