<!-- app/views/index.php -->

<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>A Blogger's Hell</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
    <style>
        body        { padding-top:30px; }
        form        { padding-bottom:20px; }
        .comment    { padding-bottom:20px; }
    </style>

    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
        <script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
        <script src="js/services/commentService.js"></script> <!-- load our service -->
        <script src="js/app.js"></script> <!-- load our application -->

</head> 

<body class="container" ng-app="editCommentApp" ng-controller="mainController">

</body>
<!-- declare our angular app and controller --> 
<body class="container" ng-app="commentApp" ng-controller="mainController"> <div class="col-md-8 col-md-offset-2">

    <!-- PAGE TITLE =============================================== -->
    <div class="page-header">
        <h2>A Blogger's Hell</h2>
        <h4>Welcome the the postings!</h4>
    </div>

    <!-- NEW COMMENT FORM =============================================== -->
    <form ng-submit="submitComment()"> <!-- ng-submit will disable the default form action and use our function -->

        <!-- TITLE -->
        <h3>Title:</h3>
        <div class="form-group">
            <input type="text" class="form-control input-lg" name="title" ng-model="commentData.title" placeholder="Title">
        </div>

         <h3>Blog Body:</h3>
        <!-- COMMENT TEXT -->
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="comment" ng-model="commentData.body" placeholder="this is where you should write your text">
        </div>

        <!-- AUTHOR -->
        <h3>Name:</h3>
        <div class="form-group">
            <input class="form-control-sm" required minlength="4" required forbiddenName="bob" type="text" name="author" id="author" ng-model="commentData.author" placeholder="Name">
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group text-right">   
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>


    <!-- LOADING ICON =============================================== -->
    <!-- show loading icon if the loading variable is set to true -->
    <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

    <!-- THE COMMENTS =============================================== -->
    <!-- hide these comments if the loading variable is true -->

    <div class="comment" ng-hide="loading" ng-repeat="comment in comments track by $index">
        <h2>{{ comment.title }}</h2>
        <p>{{ comment.body }}</p>
        <p>by {{ comment.author }}</p>
        <p>Posted on: <strong>{{comment.date}}</strong></p>
        <p><a href="#" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a></p>
    </div>
</body> 
</html>