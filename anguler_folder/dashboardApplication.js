var dashboard = angular.module('dashboard', ['ui.router', 'ngAnimate', 'ngMaterial']);


dashboard.config(["$stateProvider", function($stateProvider) {

  //dashboard home page state
  $stateProvider.state('app.dashboard', {
    url: '/dashboard',
    templateUrl: 'app/modules/dashboard/views/home.html',
    controller: 'HomeController',
    controllerAs: 'vm',
    data: {
      pageTitle: 'Home'
    }
  });

  //skills page state
  $stateProvider.state('app.pinsecurity', {
    url: '/account.pinsecurity',
    templateUrl: 'app/modules/dashboard/views/pinsecurity.html',
    //controller: 'securityController',
    controllerAs: 'vm',
    data: {
      pageTitle: 'security'
    }
  });

  //education page state
  $stateProvider.state('app.passwordsecurity', {
    url: '/passwordsecurity',
    templateUrl: 'app/modules/dashboard/views/passwordsecurity.html',
    controller: 'EducationController',
    controllerAs: 'vm',
    data: {
      pageTitle: 'Dashboard Home'
    }
  });

  //Achievements page state
  $stateProvider.state('app.authentication', {
    url: '/authentication',
    templateUrl: 'app/modules/dashboard/views/authentication.html',
    controller: 'Authentication',
    controllerAs: 'vm',
    data: {
      pageTitle: 'Send'
    }
  });
  $stateProvider.state('app.send', {
    url: '/send',
    templateUrl: 'app/modules/dashboard/views/send.html',
    controller: 'SendController',
    controllerAs: 'vm',
    data: {
      pageTitle: 'Send'
    }
  });
  $stateProvider.state('app.setting', {
    url: '/setting',
    templateUrl: 'app/modules/dashboard/views/setting.html',
    controllerAs: 'vm',
    data: {
      pageTitle: 'setting'
    }
  });

  //Recent Projects page state
  $stateProvider.state('app.receive', {
    url: '/receive',
    templateUrl: 'app/modules/dashboard/views/receive.html',
    controller: 'ReceiveController',
    controllerAs: 'vm',
    data: {
      pageTitle: 'Receive '
    }
  });
  //Experience page state
  $stateProvider.state('app.experience', {
    url: '/experience',
    templateUrl: 'app/modules/dashboard/views/experience.html',
    controller: 'ExperienceController',
    controllerAs: 'vm',
    data: {
      pageTitle: 'Experience'
    }
  });

  // Portfolio page state
  $stateProvider.state('app.portfolio', {
    url: '/portfolio',
    templateUrl: 'app/modules/dashboard/views/portfolio.html',
    controller: 'PortfolioController',
    controllerAs: 'vm',
    data: {
      pageTitle: 'Portfolio'
    }
  });

  //Contact page state
  $stateProvider.state('app.contact', {
    url: '/contact',
    templateUrl: 'app/modules/dashboard/views/contact.html',
    controller: 'ContactController',
    controllerAs: 'vm',
    data: {
      pageTitle: 'Contact Me'
    }
  });

  //Websites page state
  $stateProvider.state('app.websites', {
    url: '/websites',
    templateUrl: 'app/modules/dashboard/views/websites.html',
    controller: 'WebsitesController',
    controllerAs: 'vm',
    data: {
      pageTitle: 'Websites'
    }
  });

  //Gallery page state
  $stateProvider.state('app.gallery', {
    url: '/gallery',
    templateUrl: 'app/modules/dashboard/views/gallery.html',
    controller: 'GalleryController',
    controllerAs: 'vm',
    data: {
      pageTitle: 'Gallery'
    }
  });

  //Search page state
  /*$stateProvider.state('app.search', {
      url: '/search',
      templateUrl: 'app/modules/dashboard/views/search.html',
      controller: 'appCtrl',
      controllerAs: 'vm',
      data: {
          pageTitle: 'Search'
      }
  });*/

}]);