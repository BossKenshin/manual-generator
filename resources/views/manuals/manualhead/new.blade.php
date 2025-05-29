@extends('layouts.app')

@section('content')
<div class="container py-5">
    <ul class="nav nav-tabs" id="formTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="form1-tab" data-bs-toggle="tab" data-bs-target="#form1" type="button" role="tab" aria-controls="form1" aria-selected="true">Header (1)</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="form2-tab" data-bs-toggle="tab" data-bs-target="#form2" type="button" role="tab" aria-controls="form2" aria-selected="false">Information (2)</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="form3-tab" data-bs-toggle="tab" data-bs-target="#form3" type="button" role="tab" aria-controls="form3" aria-selected="false">Confirmation (3)</button>
        </li>
    </ul>

    <div class="tab-content mt-4" id="formTabsContent">
        <!-- Form 1 -->
        <div class="tab-pane fade show active" id="form1" role="tabpanel" aria-labelledby="form1-tab">
            @csrf
            <div class="mb-3">
                <label for="name1" class="form-label">Header (1)</label>
                <input type="text" class="form-control" id="name1" name="name1">
            </div>
            <div class="mb-3">
                <label for="attachment" class="form-label"></label>
                <input type="file" accept=".jpg .png " class="form-control" id="attachment" name="attachment">
            </div>
        </div>

        <!-- Form 2 -->
        <div class="tab-pane fade" id="form2" role="tabpanel" aria-labelledby="form2-tab">
            @csrf
            <div id="dynamic-form-sections">
                <div class="form-set mb-4 border p-3 rounded">
                    <div class="mb-3">
                        <label class="form-label step-label">Step 1</label>
                        <input type="text" class="form-control" name="headers[]">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image Attachment</label>
                        <input type="file" accept=".jpg,.png" class="form-control" name="attachments[]">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" name="descriptions[]"></textarea>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-success mb-3" id="add-form-section">+ Add More</button>
        </div>

        <!-- Form 3 -->
        <div class="tab-pane fade" id="form3" role="tabpanel" aria-labelledby="form3-tab">
            @csrf
            <div class="row">
                <!-- Left side: Styled preview -->
                <div class="col-md-8">
                    <div class="row d-flex justify-content-between align-items-center mb-3">
                        <div class="col">
                            <h4>📝 Document Preview</h4>
                        </div>
                        <div class="col text-end">
                            <button class="btn btn-outline-secondary mt-2" id="download-pdf" >🗳️ Export</button>
                        </div>
                    </div>

                    <div id="styledPreview" class="border p-2 rounded bg-white" style="min-height: 300px;">
                        <!-- Will be filled dynamically -->
                    </div>
                </div>

                <!-- Right side: Raw JSON -->
                <div class="col-md-4">
                    <h4>📦 Data Object</h4>
                    <pre id="formPreview" class="bg-light p-2 border rounded" style="white-space: pre-wrap; height: 100%; overflow: auto;"></pre>
                </div>
            </div>
        </div>
    </div> <!-- end tab-content -->

    <!-- <script src="{{ asset('build/assets/manualhead.js') }}"></script> -->
     @vite('resources/js/manualhead/manualhead.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</div>
@endsection
