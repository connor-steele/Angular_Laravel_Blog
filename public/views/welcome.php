<!DOCTYPE html>
 <html lang="en"> <head> <meta charset="UTF-8"> <title>Laravel and Angular Single Page Blog</title>
    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
      <link rel="stylesheet" href="css/app.css">
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
<body class="container" ng-app="commentApp" ng-controller="mainController">
   <div class="col-md-14">
    <div class="header-section header-alt row">
  		<header id="site-header" class="col-sm-4 col-xs-12 hidden-xs rsrc-header text-left" itemscope="" role="banner">
  		    <div class="rsrc-header-text">
  			       <h1 class="site-title" itemprop="headline" title="Laravel Angular Blog" rel="home">Laravel Angular Blog</h1>
  				</div>
  		</header>
      <div class="text-right col-sm-14" id="myTopnav">
        	<h4 class="site-desc" itemprop="description">Wholesale and Manufacturer of Exemplary Blog's</h4>
          <p>Since 1992</p>
        </div>
    </div>
    <div class="row">
      <div class="col-md-4">
          <!-- NEW COMMENT FORM =============================================== -->
          <form ng-submit="submitComment()">
            <h2>Submit a Post!</h2>
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
                   <input type="text" class="form-control input-sm" name="author" ng-model="commentData.author" placeholder="your name">
              </div>
              <div class="form-group">
                  <label for="exampleInputFile">Date</label>
                  <input min="today" type="date" class="form-control input-sm" name="date" ng-model="commentData.date" placeholder="your name">
              </div>
                <!-- SUBMIT BUTTON -->
                <div class="form-group text-right">
                    <button ng-show="showme">Update!</button>
                    <button ng-hide="showme"type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
          </form>
        </div>
        <!-- LOADING ICON =============================================== -->
        <!-- show loading icon if the loading variable is set to true -->
        <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>
        <!-- Post Table =============================================== -->
        <div class="col-md-8">
          <h2>Posts</h2>
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
              <!-- Add the comment id's to array, batch delete on click  =============================================== -->
              <tr class="comment" ng-hide="loading" ng-repeat="comment in comments track by $index">
                <td>
                  <div ng-controller="ChckbxsCtrl">
                    <div ng-repeat="chk in chkbxs">
                        <input type="checkbox" ng-model="chk.val" ng-click="addToCart(comment)"/>
                        <label>{{chk.label}}</label>
                    </div>
                    <!-- Add the comment id's to array, batch delete on click  =============================================== -->
                  </div>
              </td>
              <td>{{ comment.id }}</td>
              <td>{{ comment.title }}</td>
              <td>{{ comment.body }}</td>
              <td>{{ comment.author }}</td>
              <td>{{ comment.date }}</td>
              <td>
                <button ng-click="updateSubmitForm(comment.id); showme=true;" class="btn btn-primary">Edit</button>
                <button class="btn btn-danger" ng-click="deleteComment(comment.id)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
      <!-- Start Batch Delete Table =============================================== -->
      <div class="row">
        <div>
          <h2>Batch Delete</h2>
          <div style="border: 1px solid blue;">
        </div>
        <table border="1" class="table table-bordered">
          <tr>
            <td>ID</td>
             <td>Title</td>
             <td>Body</td>
             <td>Author</td>
             <td>Date</td>
           </tr>
           <tr ng-repeat="comment in myCartItems track by $index">
              <td>{{ comment.id }}</td>
              <td>{{ comment.title }}</td>
              <td>{{ comment.body }}</td>
              <td>{{ comment.author }}</td>
              <td>{{ comment.date }}</td>
          </tr>
         </table>
       </div>
     </div>
    <!-- Batch delete the items added to the array via checkboxes =============================================== -->
    <button class="btn btn-danger" ng-click="deleteAllSelectedComments(myCartItems)">BATCH-DELETE</button>
    </div>
  </body>
</html>
