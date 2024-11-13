<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tefatie Resto</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="form-container container mt-5">
        <h2 class="text-center">Edit Profile Anda</h2>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <input type="bio" name="bio" id="bio" class="form-control" value="{{ old('bio', $user->bio) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="password">New Password (Leave blank to keep current password)</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="profile_photo">Profile Photo (Optional)</label>
                <input type="file" name="profile_photo" id="profile_photo" class="form-control"
                    onchange="previewImage(event)">
            </div>

            <div style="mb-3">
                <img id="imagePreview" src="{{ asset('storage/'. $user->profile_photo_path) }}" alt="Preview Foto"
                    style="max-width: 300px; display: {{ $user->profile_photo_path ? 'block' : 'none' }};">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
        </form>
    </div>

    {{-- Footer --}}
    @include('bagian.footer')

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('template/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('template/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="js/main.js"></script>
    <script>
        function previewImage(event) {
                        const input = event.target;
                        const preview = document.getElementById('imagePreview');
    
                        if (input.files && input.files[0]) {
                            const reader = new FileReader();
            
                            reader.onload = function(e) {
                                preview.src = e.target.result; 
                                preview.style.display = 'block';
                            };
            
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
    </script>
</body>

</html>