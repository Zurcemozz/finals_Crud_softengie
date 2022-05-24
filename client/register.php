<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecom</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <div class="vh-100">
        <div class="container h-100">
            <div class=" d-flex justify-content-center align-items-center h-100 ">
                <form method="POST" action="./model.php" class="bg-light p-5 w-50 shadow p-3 mb-5 bg-white rounded">
                    <h1>Register</h1>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" required />
                        <label class="form-label" for="form2Example1">Email address</label>
                    </div>
                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="username" id="form2Example1" class="form-control" required />
                        <label class="form-label" for="form2Example1">Username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example2" class="form-control" required />
                        <label class="form-label" for="form2Example2">Password</label>
                    </div>


                    <!-- 2 column grid layout for inline styling -->


                    <!-- Submit button -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" name="addAccount" class="btn btn-primary btn-block mb-4">Sign in</button>
                        <p class="lead">Already have an account? <a href="./login.php" class="btn btn-outline-danger ms-2"><strong>Login Here</strong></a> </p>
                    </div>



                </form>
            </div>
        </div>
    </div>

</body>

</html>