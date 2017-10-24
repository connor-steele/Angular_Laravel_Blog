angular.module('mainCtrl', [])

    .controller('mainController', function($scope, $http, Comment) {


    $scope.editing = false;

    // today = new Date().toJSON().split('T')[0];

    $scope.addItem = function(item) {
        $scope.items.push(item);
        $scope.item = {};
    };
    $scope.myCartItems = [];
    
    $scope.removeFromCart=function(item){ 
        $scope.myCartItems.splice(item,1);     
    }

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

    $scope.addToCart = function(item)
    {

        if ($scope.myCartItems.indexOf(item) == -1) {
            $scope.myCartItems.push(item);
        } else {
             $scope.myCartItems.splice(item,1);
        }    

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
    $scope.updateComment = function(id) {
        $scope.loading = true; 
        $good_to_update = false;


    Comment.get()
        .success(function(data) {
        angular.forEach(data, function(value, key) {
            if (value.id == id) {
                value.id = id;
                value.title="new title";
                value.body= "new body";
                value.author = "Connor";
                console.log(value);
            }
        });


// expect(log).toEqual(['name: misko', 'gender: male']
                    
            // console.log(data);
            $scope.comments = data;
            $scope.loading = false;
        });
        // console.log($scope.comment);
        // console.log(Comment.author);
            // console.log(key . value)

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