var commentApp = angular.module('commentApp', ['mainCtrl', 'commentService']);  
function ChckbxsCtrl( $scope , $filter ){
    $scope.chkbxs = [{val:false}];
    
    $scope.deleteBatch = function(id) {
        var trues = $filter("filter")( $scope.chkbxs , {val:true} );
        return trues.length;
    }

}
function Ctrl($scope)
{
    $scope.date = new Date().toISOString().split("T")[0]; // 2014-05-23
    // $scope.date = new Date();
}