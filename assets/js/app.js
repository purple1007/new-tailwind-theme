import Navbar from './components/navbar';
import getPageTitle from './utils/getPageTitle'

// Initialise our components on jQuery.ready…
jQuery(function ($) {
    Navbar.init();
    getPageTitle.init();
});