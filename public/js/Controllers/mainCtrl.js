angular.module('mainCtrl', [])

    .controller('mainController', function($scope, $http, Comment) {
    // $scope.editing = false;

    // Array for collecting all desired deleted comments
    $scope.myCartItems = [];

    // Add items for batch delete into the array
    $scope.addToCart = function(item)
    {
        if ($scope.myCartItems.indexOf(item) == -1) {
            $scope.myCartItems.push(item);
        } else {
             $scope.myCartItems.splice(item,1);
        }
    }
    // Delete from array if un-checked box
    $scope.removeFromCart=function(item){
        $scope.myCartItems.splice(item,1);
    }


    // Batch Delete all comments in myCartItems array
    $scope.deleteAllSelectedComments=function(array) {
        angular.forEach(array, function(value, key) {
              // todo code for deletion
            $scope.loading = true;
            Comment.destroy(value.id)
                .success(function(data) {
                        // if successful, we'll need to refresh the comment list
                    Comment.get()
                    .success(function(getData) {
                      $scope.comments = getData;
                      $scope.loading = false;
                      $scope.myCartItems = [];
                    });
                });
            });
          }

    // object to hold all the data for the new comment form
    $scope.commentData = {};

    // loading variable to show the spinning loading icon
    $scope.loading = true;

    // get all the comments first and bind it to the $scope.comments object
    Comment.get()
        .success(function(data) {
            $scope.comments = data;
            $scope.loading = false;
        });

    // function to handle submitting the form
    $scope.submitComment = function() {
        $scope.loading = true;
        // save the comment. pass in comment data from the form
        Comment.save($scope.commentData)
            .success(function(data) {
                $scope.commentData = {};
                // if successful, we'll need to refresh the comment list
                Comment.get()
                    .success(function(getData) {
                        $scope.comments = getData;
                        $scope.loading = false;
                    });

            })
            .error(function(data) {
                console.log(data);
            });
    };
    $scope.updateSubmitForm = function(id) {
      //Load the comments
      $scope.loading = true;

      //Get the comment based on ID
      Comment.get()
        .success(function(data) {
          angular.forEach(data, function(value, key) {

            if (value.id == id) {
              // value.id = id;
              // value.title= $scope.commentData.title;
              // value.body= $scope.commentData.body;
              // value.author = $scope.commentData.author;
              // value.date = $scope.commentData.date;
              $scope.commentData.id = id;
              $scope.commentData.title = value.title;
              $scope.commentData.body = value.body;
              $scope.commentData.author = value.author;
              $scope.commentData.date = value.date;
              console.log($scope.commentData);
              // console.log(value);
              // comment.save()
          }

      });
          $scope.comments = data;
          $scope.loading = false;
      });



    }
    $scope.updateComment = function(id) {
        //Load the comments
        $scope.loading = true;
        //Get the comment based on ID
        Comment.get()
          .success(function(data) {
            angular.forEach(data, function(value, key) {
              if (value.id == id) {
                deleteComment(id);
              } else {
                value.id = id - 1;
              }
               submitComment();
        });
            $scope.comments = data;
            $scope.loading = false;
        });

    }

        // function to handle deleting a comment
        $scope.deleteComment = function(id) {
            if (confirm("Are you sure you want to delete this post?")) {
        // todo code for deletion

            $scope.loading = true;

            Comment.destroy(id)
                .success(function(data) {

                    // if successful, we'll need to refresh the comment list
                    Comment.get()
                        .success(function(getData) {
                            $scope.comments = getData;
                            $scope.loading = false;
                       });

                });
            }
        };

    });
