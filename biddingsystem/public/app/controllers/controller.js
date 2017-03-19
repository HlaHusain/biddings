/**
 * Main application controller
 *
 * You can use this controller for your whole app if it is small
 * or you can have separate controllers for each logical section
 * 
 */
;(function() {
// ..................................................................................

  angular
    .module('myApp')
    .controller('MainController', MainController);

  MainController.$inject = ['QueryService'];



  function MainController(QueryService) {
    // 'controller as' syntax
    var self = this;
    ////////////  function definitions
    /**
     * Load some data
     * @return {Object} Returned object
     */
    // QueryService.query('GET', 'posts', {}, {})
    //   .then(function(ovocie) {
    //     self.ovocie = ovocie.data;
    //   });
  }


    // angular
    //     .module('boilerplate')
    //     .controller('LoginController', LoginController);
    //
    // LoginController.$inject = ['QueryService'];
    //
    //
    //
    // function LoginController(QueryService) {
    //     // 'controller as' syntax
    //     var self = this;
    //     ////////////  function definitions
    //     /**
    //      * Load some data
    //      * @return {Object} Returned object
    //      */
    //     // QueryService.query('GET', 'posts', {}, {})
    //     //   .then(function(ovocie) {
    //     //     self.ovocie = ovocie.data;
    //     //   });
    // }




})();