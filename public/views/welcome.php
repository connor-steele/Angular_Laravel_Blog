<!-- app/views/index.php -->

<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Laravel and Angular Comment System</title>

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
<!-- declare our angular app and controller --> 
<body class="container" ng-app="commentApp" ng-controller="mainController"> <div class="col-md-14">

    <!-- PAGE TITLE =============================================== -->
    <div class="page-header">
        <h2>Laravel and Angular Single Page Application</h2>
        <h4>Commenting System</h4>
    </div>
<div class="col-md-4">
        <!-- NEW COMMENT FORM =============================================== -->
        <form ng-submit="submitComment()">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control input-lg" name="title" ng-model="commentData.title" placeholder="greatTitle">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Body</label>
                <input type="text" class="form-control input" name="comment" ng-model="commentData.body" placeholder="Write what's on your mind!">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Author</label>
                 <input type="text" class="form-control input-sm" name="author" ng-model="commentData.author" placeholder="">
            </div>
                <!-- SUBMIT BUTTON -->
                <div class="form-group text-right">   
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
        </form>
</div>
    <!-- LOADING ICON =============================================== -->
    <!-- show loading icon if the loading variable is set to true -->
    <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

<div class="col-md-8">
    <!-- <div class="comment" ng-hide="loading" ng-repeat="comment in comments track by $index"> -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Author</th>
            <th>Date</th>
            <th width="220px">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr class="comment" ng-hide="loading" ng-repeat="comment in comments track by $index">
            <td>{{ comment.id }}</td>
            <td>{{ comment.title }}</td>
            <td>{{ comment.body }}</td>
            <td>{{ comment.author }}</td>
            <td>{{ comment. }}</td>
            <td>
            <button data-toggle="modal" ng-click="edit(value.id)" data-target="#edit-data" class="btn btn-primary">Edit</button>
            <button class="btn btn-danger" ng-click="deleteComment(comment.id)">Delete</button>
            </td>
        </tr>
    </tbody>
</table>
</div>
    <!-- THE COMMENTS =============================================== -->
    <!-- hide these comments if the loading variable is true -->
<!-- 
        <p>{{ comment.body }}</p>
        <h3>by {{ comment.author }}</h3>

        <p><a href="#" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a></p> -->
    <!-- </div> -->

</div> 
</body> 
</html>