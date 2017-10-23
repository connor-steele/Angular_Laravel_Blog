var commentApp = angular.module('commentApp', ['mainCtrl', 'commentService']);  
function MyCtrl($scope, $filter) {
    $scope.form_text = $filter('date')(Date.now(), 'yyyy-MM-dd');
      $scope.date_rdv = $filter('date')(Date.now(), 'yyyy-MM-dd');
}