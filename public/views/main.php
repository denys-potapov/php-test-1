<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wired comments</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      @media (min-width: 768px) {
        .container {
          max-width: 730px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1><i class="fa fa-comment"></i> comments</h1>
      </div>
      
<?php 
    $comments = $services->get('comments')->get();
    foreach ($comments as $comment) {
?>
    <div class="row">
        <blockquote>
            <p><?php echo $comment->text ?></p>
            <footer><?php echo htmlspecialchars($comment->author) ?></footer>
        </blockquote>
    </div>
<?php } ?>
   
    <div class="row">
        <h2>Add your opinion</h2>
        <p>You can use smiles :) <3 0+</p>
        <form class="form-horizontal" method="POST" action="/">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="your name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Text</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" id="text" name="text" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Comment</button>
            </div>
          </div>
        </form>
    </div>

    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>