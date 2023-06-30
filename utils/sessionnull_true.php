<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <div class="redirect">
            <div class="redirect-container">
                <div class="redirect-message">
                    <h1>Redirecting to login</h1>

                </div>
            </div>
        </div>
        <?php header("refresh:3;../loginpage.php"); ?>
    </body>
</html>

<style>
    .redirect{
        display:flex;
        align-items: center;
        position: relative;
        justify-content: center;
        flex-direction: column;
        top:50%;
    }
</style>