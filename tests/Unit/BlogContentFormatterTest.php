<?php

namespace Tests\Unit;

use App\Support\BlogContentFormatter;
use PHPUnit\Framework\TestCase;

class BlogContentFormatterTest extends TestCase
{
    public function test_it_builds_semantic_sections_from_plain_text(): void
    {
        $article = BlogContentFormatter::format(
            'Best MLM Software Guide',
            implode("\n", [
                'Best MLM Software Guide',
                '',
                'Why MLM Software Matters',
                'MLM software helps businesses automate payouts and manage distributors with confidence.',
                '',
                'Core Benefits',
                '- Faster commission processing',
                '- Better member visibility',
                '',
                'Choosing the Right Plan',
                'Pick a plan that matches your compensation logic and reporting needs.',
            ])
        );

        $this->assertSame(
            ['Why MLM Software Matters', 'Choosing the Right Plan'],
            array_column($article['sections'], 'heading')
        );

        $this->assertSame('paragraph', $article['sections'][0]['blocks'][0]['type']);
        $this->assertSame('subheading', $article['sections'][0]['blocks'][1]['type']);
        $this->assertSame('Core Benefits', $article['sections'][0]['blocks'][1]['text']);
        $this->assertSame('list', $article['sections'][0]['blocks'][2]['type']);
        $this->assertCount(2, $article['sections'][0]['blocks'][2]['items']);
    }

    public function test_it_adds_overview_and_deduplicates_images(): void
    {
        $article = BlogContentFormatter::format(
            'MLM Software in Texas',
            implode("\n", [
                'This guide explains what to look for in a city-ready MLM platform.',
                '',
                'It also covers deployment support, customization, and long-term scaling.',
            ]),
            ['/uploads/a.jpg', '/uploads/a.jpg', '/uploads/b.jpg']
        );

        $this->assertSame('Overview', $article['sections'][0]['heading']);

        $images = collect($article['sections'])
            ->flatMap(fn (array $section) => $section['blocks'])
            ->where('type', 'image')
            ->values();

        $this->assertCount(2, $images);
        $this->assertSame(['/uploads/a.jpg', '/uploads/b.jpg'], $images->pluck('src')->all());
    }

    public function test_it_honors_markdown_style_headings(): void
    {
        $article = BlogContentFormatter::format(
            'MLM Launch Checklist',
            implode("\n", [
                '## Planning Your Launch',
                'Start with compensation rules, onboarding flows, and compliance review.',
                '',
                '### Team Alignment',
                'Bring product, support, and finance teams into the rollout plan.',
            ])
        );

        $this->assertSame('Planning Your Launch', $article['sections'][0]['heading']);
        $this->assertSame('subheading', $article['sections'][0]['blocks'][1]['type']);
        $this->assertSame('Team Alignment', $article['sections'][0]['blocks'][1]['text']);
    }
}
