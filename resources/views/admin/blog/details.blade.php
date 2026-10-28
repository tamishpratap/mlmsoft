@extends('admin.layouts.main')
@section('title', 'Blog Details')
@section('content')
    @push('head')
        <link rel="stylesheet" href="{{ asset('adm_assets/assets/plugins/DataTables/datatables.min.css') }}">
        <style>
            .blog-management-page .card-body {
                padding: 20px;
            }

            .blog-management-page .card .card-header {
                flex-wrap: wrap;
                gap: 10px;
                justify-content: space-between;
            }

            .blog-management-page .card .card-header .card-header-right {
                margin-left: auto;
                position: static;
            }

            .blog-management-page .table-responsive {
                margin: 0 -20px;
                padding: 0 20px;
            }

            .blog-management-page .table {
                margin-bottom: 0;
            }

            .blog-management-page .table tbody tr {
                transition: background-color 0.2s ease, box-shadow 0.2s ease;
            }

            .blog-management-page .table tbody tr:hover {
                background-color: #fbfcfd;
                box-shadow: inset 3px 0 0 #19B5FE;
            }

            .blog-thumb-wrap {
                align-items: center;
                display: flex;
                gap: 12px;
                min-width: 130px;
            }

            .blog-img {
                border: 1px solid #eef1f2;
                border-radius: 4px;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
                height: 58px;
                object-fit: cover;
                width: 72px;
            }

            .blog-title-text {
                color: #212121;
                display: -webkit-box;
                font-weight: 700;
                line-height: 1.45;
                max-width: 320px;
                overflow: hidden;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 2;
            }

            .blog-body-text {
                color: #4F5467;
                display: -webkit-box;
                line-height: 1.55;
                max-width: 430px;
                overflow: hidden;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 3;
            }

            .blog-meta-stack {
                display: grid;
                gap: 8px;
                justify-items: flex-start;
            }

            .blog-status-badge,
            .blog-category-badge {
                align-items: center;
                border-radius: 4px;
                display: inline-flex;
                font-size: 12px;
                font-weight: 700;
                gap: 6px;
                padding: 7px 10px;
                white-space: nowrap;
            }

            .blog-category-badge {
                background: #f6f8fb;
                color: #4F5467;
            }

            .blog-date {
                color: #868e96;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                font-size: 13px;
                white-space: nowrap;
            }

            .blog-action-group {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
            }

            .blog-action-btn {
                align-items: center;
                border-radius: 4px;
                display: inline-flex;
                font-size: 12px;
                font-weight: 700;
                gap: 6px;
                justify-content: center;
                min-width: 78px;
                padding: 7px 12px;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .blog-action-btn:hover,
            .blog-action-btn:focus {
                transform: translateY(-1px);
            }

            .blog-action-btn.btn-primary:hover {
                box-shadow: 0 4px 12px rgba(0, 123, 255, 0.16);
            }

            .blog-action-btn.btn-danger:hover {
                box-shadow: 0 4px 12px rgba(245, 54, 92, 0.16);
            }

            .blog-stat-card {
                background: #f6f8fb;
                border: 1px solid #eef1f2;
                border-radius: 4px;
                display: inline-flex;
                align-items: center;
                gap: 12px;
                padding: 10px 14px;
            }

            .blog-stat-card i {
                color: #19B5FE;
                font-size: 20px;
            }

            .blog-stat-card span {
                color: #868e96;
                display: block;
                font-size: 12px;
                line-height: 1.2;
            }

            .blog-stat-card strong {
                color: #212121;
                display: block;
                font-size: 18px;
                line-height: 1.2;
            }

            .blog-modal .modal-dialog {
                max-width: 820px;
            }

            .blog-modal .modal-content {
                border: none;
                border-radius: 4px;
                box-shadow: 0 6px 0 0 rgba(0, 0, 0, 0.01), 0 15px 32px 0 rgba(0, 0, 0, 0.12);
                overflow: hidden;
            }

            .blog-modal.fade .modal-dialog {
                transform: translate(0, 14px) scale(0.98);
                transition: transform 0.25s ease-out;
            }

            .blog-modal.show .modal-dialog {
                transform: translate(0, 0) scale(1);
            }

            .blog-modal .modal-header,
            .blog-modal .modal-footer {
                padding: 20px;
            }

            .blog-modal .modal-header {
                align-items: center;
                border-bottom: 1px solid #f1f1f1;
            }

            .blog-modal .modal-title-wrap {
                align-items: center;
                display: flex;
                gap: 15px;
                min-width: 0;
            }

            .blog-modal .modal-icon {
                align-items: center;
                border-radius: 5px;
                color: #ffffff;
                display: inline-flex;
                flex: 0 0 40px;
                font-size: 20px;
                height: 40px;
                justify-content: center;
                width: 40px;
                box-shadow: 0 2px 12px -3px rgba(0, 0, 0, 0.5);
            }

            .blog-modal .modal-title {
                color: #212121;
                font-size: 18px;
                font-weight: 700;
            }

            .blog-modal .modal-subtitle {
                color: #868e96;
                font-size: 13px;
                margin-top: 3px;
            }

            .blog-modal .modal-body {
                background: #f6f8fb;
                padding: 20px;
            }

            .blog-modal .close {
                color: #4c5667;
                opacity: 1;
                text-shadow: none;
            }

            .blog-edit-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 14px;
            }

            .blog-edit-image-card {
                background: #ffffff;
                border: 1px solid #eef1f2;
                border-radius: 4px;
                padding: 12px;
            }

            .current-blog-img {
                background: #f6f8fb;
                border: 1px solid #eef1f2;
                border-radius: 4px;
                height: 86px;
                margin-bottom: 10px;
                object-fit: cover;
                width: 100%;
            }

            .blog-preview-image {
                background: #f6f8fb;
                border-radius: 4px;
                display: block;
                max-height: 70vh;
                max-width: 100%;
                object-fit: contain;
                width: 100%;
            }

            .delete-warning-box {
                background: #ffffff;
                border: 1px solid #eef1f2;
                border-radius: 4px;
                color: #4F5467;
                line-height: 1.6;
                padding: 18px 20px;
            }

            @media (max-width: 991.98px) {
                .blog-action-group {
                    min-width: 170px;
                }
            }

            @media (max-width: 767.98px) {
                .blog-edit-grid {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 575.98px) {
                .blog-management-page .card-body,
                .blog-modal .modal-header,
                .blog-modal .modal-body,
                .blog-modal .modal-footer {
                    padding: 15px;
                }

                .blog-management-page .card .card-header .card-header-right {
                    margin-left: 0;
                    width: 100%;
                }

                .blog-management-page .card .card-header .card-header-right .btn {
                    justify-content: center;
                    width: 100%;
                }

                .blog-management-page .table-responsive {
                    margin: 0 -15px;
                    padding: 0 15px;
                }

                .blog-modal .modal-dialog {
                    margin: 10px;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                .blog-management-page .table tbody tr,
                .blog-action-btn,
                .blog-modal.fade .modal-dialog {
                    transition: none;
                }
            }
        </style>
    @endpush

    <div class="container-fluid blog-management-page">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-list bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Blog Details') }}</h5>
                            <span>{{ __('Manage published website blog content') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Admin') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Blog Details') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="ik ik-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('All Blogs') }}</h3>
                        <div class="card-header-right">
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-primary btn-sm">
                                <i class="ik ik-plus"></i> {{ __('Create Blog') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                            <div class="blog-stat-card">
                                <i class="ik ik-edit"></i>
                                <div>
                                    <span>{{ __('Total Blogs') }}</span>
                                    <strong>{{ $blogs->count() }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover w-100" id="blogs-table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Category / Status') }}</th>
                                        <th>{{ __('Content') }}</th>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade blog-modal" id="editBlogModal" tabindex="-1" role="dialog" aria-labelledby="editBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form class="modal-content" id="editBlogForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <div class="modal-title-wrap">
                        <span class="modal-icon bg-blue">
                            <i class="ik ik-edit-2"></i>
                        </span>
                        <div>
                            <h5 class="modal-title mb-0" id="editBlogModalLabel">{{ __('Edit Blog') }}</h5>
                            <div class="modal-subtitle">{{ __('Update blog content and media') }}</div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ik ik-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editTitle" class="font-weight-bold">{{ __('Blog Title') }}</label>
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="editText" class="font-weight-bold">{{ __('Blog Content') }}</label>
                        <textarea class="form-control" id="editText" name="text" rows="7" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="editSocialUrl" class="font-weight-bold">{{ __('Social URL') }}</label>
                        <input type="url" class="form-control" id="editSocialUrl" name="social_url"
                            placeholder="https://example.com">
                    </div>

                    <div class="form-group mb-0">
                        <label class="font-weight-bold">{{ __('Images') }}</label>
                        <div class="blog-edit-grid">
                            <div class="blog-edit-image-card">
                                <img src="" alt="Current Blog Image 1" class="current-blog-img" id="editCurrentImage1">
                                <input type="file" class="form-control" id="editImage1" name="img1" accept="image/*">
                            </div>
                            <div class="blog-edit-image-card">
                                <img src="" alt="Current Blog Image 2" class="current-blog-img" id="editCurrentImage2">
                                <input type="file" class="form-control" id="editImage2" name="img2" accept="image/*">
                            </div>
                            <div class="blog-edit-image-card">
                                <img src="" alt="Current Blog Image 3" class="current-blog-img" id="editCurrentImage3">
                                <input type="file" class="form-control" id="editImage3" name="img3" accept="image/*">
                            </div>
                        </div>
                        <span class="text-muted small d-block mt-2">{{ __('Leave image fields empty to keep existing images.') }}</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="ik ik-x-circle"></i> {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ik ik-save"></i> {{ __('Update Blog') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade blog-modal" id="imagePreviewModal" tabindex="-1" role="dialog" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title-wrap">
                        <span class="modal-icon bg-blue">
                            <i class="ik ik-image"></i>
                        </span>
                        <div>
                            <h5 class="modal-title mb-0" id="imagePreviewModalLabel">{{ __('Blog Image') }}</h5>
                            <div class="modal-subtitle">{{ __('Image preview') }}</div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ik ik-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="Blog Preview" class="blog-preview-image" id="blogPreviewImage">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade blog-modal" id="deleteBlogModal" tabindex="-1" role="dialog" aria-labelledby="deleteBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title-wrap">
                        <span class="modal-icon bg-danger">
                            <i class="ik ik-trash-2"></i>
                        </span>
                        <div>
                            <h5 class="modal-title mb-0" id="deleteBlogModalLabel">{{ __('Delete Blog') }}</h5>
                            <div class="modal-subtitle">{{ __('Confirm blog removal') }}</div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ik ik-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="delete-warning-box">
                        {{ __('This blog and its uploaded images will be removed permanently.') }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="ik ik-x-circle"></i> {{ __('Cancel') }}
                    </button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBlog">
                        <i class="ik ik-trash-2"></i> {{ __('Delete') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script src="{{ asset('adm_assets/assets/plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('adm_assets/assets/js/datatables.js') }}"></script>
        <script>
        $(function() {
            const editRouteTemplate = "{{ route('admin.blog.update', ['blog' => '__ID__']) }}";
            const deleteRouteTemplate = "{{ route('admin.blog.destroy', ['blog' => '__ID__']) }}";
            const uploadBaseUrl = "{{ asset('uploads') }}";
            let pendingDeleteUrl = null;

            const escapeHtml = function(value) {
                return String(value || '').replace(/[&<>"']/g, function(character) {
                    const entities = {
                        '&': '&amp;',
                        '<': '&lt;',
                        '>': '&gt;',
                        '"': '&quot;',
                        "'": '&#39;'
                    };

                    return entities[character];
                });
            };

            const valueOrNA = function(value) {
                const text = String(value || '').trim();
                return text ? text : 'N/A';
            };

            const table = $('#blogs-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('admin.blog.details') }}",
                order: [[4, 'desc']],
                columns: [
                    {
                        data: 'primary_image_url',
                        name: 'img1',
                        orderable: false,
                        searchable: false,
                        render: function(data, type) {
                            if (type !== 'display') {
                                return data;
                            }

                            if (!data) {
                                return '<span class="text-muted">No image</span>';
                            }

                            return `
                                <div class="blog-thumb-wrap">
                                    <img src="${escapeHtml(data)}" alt="Blog Image" class="blog-img">
                                    <button type="button" class="btn btn-light btn-sm blog-action-btn view-image-btn" data-image="${escapeHtml(data)}">
                                        <i class="ik ik-eye"></i>
                                    </button>
                                </div>
                            `;
                        }
                    },
                    {
                        data: 'title',
                        name: 'title',
                        render: function(data, type) {
                            if (type !== 'display') {
                                return data;
                            }

                            return `<span class="blog-title-text">${escapeHtml(valueOrNA(data))}</span>`;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type) {
                            if (type !== 'display') {
                                return data;
                            }

                            return `
                                <span class="blog-meta-stack">
                                    <span class="blog-category-badge"><i class="ik ik-tag"></i> Blog</span>
                                    <span class="badge badge-success blog-status-badge"><i class="ik ik-check-circle"></i> Published</span>
                                </span>
                            `;
                        }
                    },
                    {
                        data: 'text',
                        name: 'text',
                        render: function(data, type) {
                            if (type !== 'display') {
                                return data;
                            }

                            return `<span class="blog-body-text">${escapeHtml(valueOrNA(data))}</span>`;
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, row) {
                            if (type !== 'display') {
                                return data;
                            }

                            return `<span class="blog-date"><i class="ik ik-calendar"></i>${escapeHtml(valueOrNA(row.date_plain || row.date || data))}</span>`;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type) {
                            if (type !== 'display') {
                                return data;
                            }

                            return `
                                <div class="blog-action-group">
                                    <button type="button" class="btn btn-primary btn-sm blog-action-btn edit-blog-btn" data-id="${data}">
                                        <i class="ik ik-edit-2"></i> Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm blog-action-btn delete-blog-btn" data-id="${data}">
                                        <i class="ik ik-trash-2"></i> Delete
                                    </button>
                                </div>
                            `;
                        }
                    }
                ],
                language: {
                    emptyTable: '<div class="text-center py-4 text-muted">No blogs found.</div>',
                    zeroRecords: '<div class="text-center py-4 text-muted">No matching blogs found.</div>'
                }
            });

            $('#blogs-table').on('click', '.edit-blog-btn', function() {
                const row = table.row($(this).closest('tr')).data();

                if (!row) {
                    return;
                }

                $('#editBlogForm').attr('action', editRouteTemplate.replace('__ID__', row.id));
                $('#editTitle').val(row.title || '');
                $('#editText').val(row.text || '');
                $('#editSocialUrl').val(row.social_url || '');
                $('#editImage1, #editImage2, #editImage3').val('');

                const setCurrentImage = function(selector, image) {
                    const preview = $(selector);

                    if (image) {
                        preview.attr('src', uploadBaseUrl + '/' + image).show();
                    } else {
                        preview.removeAttr('src').hide();
                    }
                };

                setCurrentImage('#editCurrentImage1', row.img1);
                setCurrentImage('#editCurrentImage2', row.img2);
                setCurrentImage('#editCurrentImage3', row.img3);

                $('#editBlogModal').modal('show');
            });

            $('#blogs-table').on('click', '.view-image-btn', function() {
                const image = $(this).data('image');

                if (!image) {
                    return;
                }

                $('#blogPreviewImage').attr('src', image);
                $('#imagePreviewModal').modal('show');
            });

            $('#blogs-table').on('click', '.delete-blog-btn', function() {
                const id = $(this).data('id');
                pendingDeleteUrl = deleteRouteTemplate.replace('__ID__', id);
                $('#deleteBlogModal').modal('show');
            });

            $('#confirmDeleteBlog').on('click', function() {
                if (!pendingDeleteUrl) {
                    return;
                }

                const button = $(this);
                button.prop('disabled', true);

                $.ajax({
                    url: pendingDeleteUrl,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE'
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#deleteBlogModal').modal('hide');
                            table.ajax.reload(null, false);
                        }
                    },
                    error: function() {
                        alert('Unable to delete blog. Please try again.');
                    },
                    complete: function() {
                        pendingDeleteUrl = null;
                        button.prop('disabled', false);
                    }
                });
            });
        });
        </script>
    @endpush
@endsection
