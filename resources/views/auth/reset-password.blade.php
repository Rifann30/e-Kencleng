<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin & Dashboard Template">
	<meta name="author" content="Takmir Masjid Akbar">
	<link rel="shortcut icon" href="icon/takmir.png" />

	<title>Reset Password :: Kencleng Masjid Akbar</title>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('adminkit/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<style>
	html, body {
		margin: 0;
		padding: 0;
		width: 100%;
		height: 100vh;
		overflow: hidden;
		background: url('img/masjid.jpg')  repeat-y center 80%;
		background-size: cover;
		color: white;
		font-family: 'Inter', sans-serif;
	}

	body::before {
		content: "";
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(0, 0, 0, 0.8);
		z-index: 0;
	}

	main {
		position: relative;
		z-index: 1;
		width: 100%;
		min-height: 100vh;
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 2rem;
		box-sizing: border-box;
	}

	.card {
		background: rgba(255, 255, 255, 0.05);
		border: 1px solid #1A973D;
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
		border-radius: 1rem;
		color: #ffffff;
		backdrop-filter: blur(10px);
		-webkit-backdrop-filter: blur(15px);
	}

	.form-control {
		background-color: rgba(255, 255, 255, 0.1);
		border: 1px solid #1A973D;
		color: #ffffff;
	}

	.form-control::placeholder {
		color: rgba(255, 255, 255, 0.6);
	}

	.form-label {
		color: #23D155;
		font-weight: 500;
	}

	a {
		color: #23D155;
		text-decoration: underline;
	}

	.btn-hijau {
		background-color: #1A973D;
		border-color: #1A973D;
		color: white;
		transition: background-color 0.3s ease;
	}

	.btn-hijau:hover {
		background-color: #105C26;
		border-color: #105C26;
		color: white;
	}

	.invalid-feedback {
		color: #ff6b6b;
	}
</style>

</head>

<body>
	<main class="d-flex w-100">
        <div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

                    <div class="container">
                        <h3>Ganti Password</h3>
                        <form method="POST" action="/reset-password">
                            @csrf
                            <input type="hidden" name="token" id="token" value="{{ $token }}" required>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Password Baru</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-hijau">Reset Password</button>
                        </form>
                    </div>


                    @if ($errors->any())
                        <div class="alert alert-danger col-md-6 mt-3" style="max-width: 400px">
                            <ul>
                                @foreach ($errors->all() as $errors)
                                    <li>{{$errors}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif





                    </div>
                </div>
            </div>
        </div>

	</main>

	<script>
		document.getElementById('year').textContent = new Date().getFullYear();
	</script>

	<script src="{{ asset('adminkit/js/app.js') }}"></script>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
</body>

</html>

