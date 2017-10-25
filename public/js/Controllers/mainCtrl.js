angular.module('mainCtrl', [])

    .controller('mainController', function($scope, $http, Comment) {
      // object to hold all the data for the new comment form
      $scope.commentData = {};

      // reload the data
      $scope.loading = true;
      // $scope.editing = false;

      // Array for collecting batch delete items
      $scope.myCartItems = [];

      // get all the comments first and bind it to the $scope.comments object
      Comment.get()
          .success(function(data) {
              $scope.comments = data;
              $scope.loading = false;
          });

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
        if (confirm("Are you sure you want to delete all of these posts?")) {
          //go over each value iin the returned array
          angular.forEach(array, function(value, key) {
              $scope.loading = true;
              //destroy each item in the array
              Comment.destroy(value.id)
                  .success(function(data) {
                      // if successful, we'll need to refresh the comment list
                    Comment.get()
                      //reset all the variables
                      .success(function(getData) {
                        $scope.comments = getData;
                        $scope.loading = false;
                        $scope.myCartItems = [];
                      });
                  });
            });
        };
      }
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
            //go over each value, check if the item already exists
            angular.forEach(data, function(value, key) {
              //if the id exists, update the scope
              if (value.id == id) {
                $scope.commentData.id = id;
                $scope.commentData.title = value.title;
                $scope.commentData.body = value.body;
                $scope.commentData.author = value.author;
                $scope.commentData.date = value.date;
                console.log($scope.commentData);
                // comment.save()
              }

            });
            // Reload the data
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
