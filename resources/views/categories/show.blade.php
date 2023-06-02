@extends('layouts.app')
@section('title', 'Show Product')
@section('contents')
    <h1 class="mb-0">Detail category</h1>

    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" placeholder="Category" value="{{ $category->category }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Image:</label>

            <input type="file" class="form-control" name="image" placeholder="Enter The Image"
                onchange="previewImage(event)">
            <img id="imagePreview" src="{{ asset('admin_assets/img/' . $category->image) }}" alt="Image"
                style="max-width:60px;">
        </div>

        <script>
            function previewImage(event) {
                var input = event.target;
                var reader = new FileReader();

                reader.onload = function() {
                    var imagePreview = document.getElementById('imagePreview');
                    imagePreview.src = reader.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        </script>
        <div class="col mb-3">
            <label class="form-label">Status</label>
            <select name="status" id="" class="form-control" value="{{ $category->status }}"
                onchange="showSelectedCategory(this)">
                <option value="">Select Category Type:</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>

        </div>
        <script>
            function showSelectedCategory(selectElement) {
                var selectedCategory = selectElement.value;
                var selectedTitle = "{{ $category->id }}";

                Swal.fire({
                    title: 'Selected Category',
                    text: 'You have chosen ' + selectedCategory + ' for the category with id: ' + selectedTitle,
                    icon: 'info',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
        </script>
        <div class="col mb-3">
            <label class="form-label">Availibilty</label>
            <select name="available" id="" class="form-control" value="{{ $category->available }}"
                onchange="showSelectedCategory(this)">
                <option value="">Select Availibilty Type:</option>
                <option value="Available">Available</option>
                <option value="unAvailable">unAvailable</option>
            </select>

        </div>
        <script>
            function showSelectedCategory(selectElement) {
                var selectedCategory = selectElement.value;
                var selectedTitle = "{{ $category->id }}";

                Swal.fire({
                    title: 'Selected Category',
                    text: 'You have chosen ' + selectedCategory + ' for the category with id: ' + selectedTitle,
                    icon: 'info',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
        </script>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="" readonly>
        </div>

    </div>
    {{-- <button class="btn btn-primary">Back</button> --}}

@endsection
