var app = 	angular.module("myApp", ['ngRoute']);

			app.config(function($routeProvider,$locationProvider) {
		        $routeProvider
		            .when("/", {
		                templateUrl: "partials/dashboard.html",                
		                
		            })
		            .when("/category", {
		                // controller: "NewContactController",
		                templateUrl: "partials/category.html"
		            })		           
		            .when("/course",{
		            	templateUrl: "partials/course.html"	
		            })
		            .when("/university",{
		            	templateUrl: "partials/university.html"	
		            })
		            .when("/users",{
		            	templateUrl: "partials/users.html"	
		            })
		            .otherwise({
		                redirectTo: "/"
		            })

		            //$locationProvider.html5Mode(true);
		    })


		
			app.controller('getMyFollowers', function($scope,$http,$rootScope){
				$http.get("/user/getFollowersList").
                	then(function(response) {
                    	$scope.myFollowersList = response.data;
                });

                $scope.follow = function(userId, $index){                	
                	$http({
						method 	: 'POST',
						url		: '/user/dofollow',
						data    : {userId:userId},
						headers : { 'Content-Type': 'application/json' } 
					})
					.then(function(response){							
						//$scope.follow[$index] = false;						
						$rootScope.following = $rootScope.following + 1;
					})
                }

                 $scope.unFollow = function(userId,$index){                	
                	$http({
						method 	: 'POST',
						url		: '/user/unfollow',
						data    : {userId:userId},
						headers : { 'Content-Type': 'application/json' } 
					})
					.then(function(response){													
						$rootScope.following = $rootScope.following - 1;
						//$scope.follow[$index] = true;
					});
                }


                
			});

			