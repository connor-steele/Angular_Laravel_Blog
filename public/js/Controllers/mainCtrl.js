angular.module('mainCtrl', [])

    .controller('mainController', function($scope, $http, Comment) {

   // $scope.items = [
   //      {Product:"Moto G2", Desc: "Android Phone", Price: 10999},
   //      {Product:"The Monk who sold his ferrari", Desc: "Motivational book", Price: 250},
   //      {Product:"Mi Power Bank", Desc: "Power Bank", Price: 999},
   //      {Product:"Dell Inspiron 3537", Desc: "Laptop", Price: 45600}
   //  ];

    $scope.editing = false;
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
console.log(value.id);
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