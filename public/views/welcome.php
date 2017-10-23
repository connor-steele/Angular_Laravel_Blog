<!-- app/views/index.php -->

<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Laravel and Angular Single Page Blog</title>

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
        <h2>Laravel and Angular Single Page Blog</h2>
        <h4>Advanced Interview Material</h4>
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
            <th></th>
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
            <td>
                <div ng-controller="ChckbxsCtrl">
                    <div ng-repeat="chk in chkbxs">
                        <input type="checkbox" ng-model="chk.val" ng-click="addToCart(comment)"/>
                        <!-- <td><button type="button" ng-click="addToCart(comment)">Add to cart</button></td> -->
                        <label>{{chk.label}}</label>
                    </div>
                    <div class="delete_these" ng-show="deleteBatch()">
                        {{ comment.id }}
                    </div>


                </div>
            </td>
            <td>{{ comment.id }}</td>
            <td>{{ comment.title }}</td>
            <td>{{ comment.body }}</td>
            <td>{{ comment.author }}</td>
            <td>{{ comment.date }}</td>
            <td> 
            <button data-toggle="modal" ng-click="edit(value.id)" data-target="#edit-data" class="btn btn-primary">Edit</button>
            <button class="btn btn-danger" ng-click="deleteComment(comment.id)">Delete</button>
            </td>
        </tr>
    </tbody>
</table>
     
<!--         <table border="1" class="mytable">
        <tr>
        <td>ID</td>/
           <td>Title</td>
           <td>Body</td>
           <td>Author</td>
           <td>Date</td>
           <td>Add to cart</td>
        </tr>
        <tr ng-repeat="comment in comments track by $index">
                  What should be here
            <td>{{ comment.id }}</td>
            <td>{{ comment.title }}</td>
            <td>{{ comment.body }}</td>
            <td>{{ comment.author }}</td>
            <td>{{ comment.date }}</td>
<td><button type="button" ng-click="addToCart(comment)">Add to cart</button></td>
        </tr>
       </table> -->
     <h2>Batch Delete</h2>
        <div style="border: 1px solid blue;">
        </div>
        <table border="1" class="table table-bordered">
        <tr>
        <td>ID</td>/
           <td>Title</td>
           <td>Body</td>
           <td>Author</td>
           <td>Date</td>
           <td>Add to cart</td>
        </tr>

        <tr ng-repeat="comment in myCartItems track by $index">

            <td>{{ comment.id }}</td>
            <td>{{ comment.title }}</td>
            <td>{{ comment.body }}</td>
            <td>{{ comment.author }}</td>
            <td>{{ comment.date }}</td>
        </tr>
       </table>
        <button class="btn btn-danger" ng-click="deleteAllSelectedComments(myCartItems)">BATCH-DELETE</button>
</div>

           

</div> 
</body> 
</html>