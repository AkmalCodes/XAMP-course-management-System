
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body>
  <div class="container my-5">
    <form method="post" action="utils/register.php">
      <div class="mb-3">
        <h4>your username</h4>
        <input type="text" class="form-control" placeholder="username" name="username" >
      </div>
      <div class="mb-3">
        <h4>your password</h4>
        <input type="password" class="form-control" placeholder="password" name="password" >
      </div>
      <div class="mb-3">
        <h4>your email</h4>
        <input type="email" class="form-control" placeholder="email" name="email">
      </div>
      <div class="mb-3">
        <h4>your first_name</h4>
        <input type="text" class="form-control" placeholder="first name" name="first_name" >
      </div>
      <div class="mb-3">
        <h4>your last_name</h4>
        <input type="text" class="form-control" placeholder="last name" name="last_name" >
      </div>
      <div class="mb-3">
        <h4>Your date of birth</h4>
        <input type="date" class="form-control" name="date_of_birth">
      </div>
      <div class="mb-3">
        <h4>your address</h4>
        <input type="text" class="form-control" placeholder="address" name="address">
      </div>
      <div class="mb-3">
        <h4>your phone_number</h4>
        <input type="text" class="form-control" placeholder="phone number" name="phone_number" >
      </div>
      <div class="mb-3">
        <h4>Register as</h4>
        <select name="user_type" id="user_type">
          <option value="instructor">Instructor</option>
          <option value="student">Student</option>
        </select>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>