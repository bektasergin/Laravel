import axios from 'axios';
import jQuery from 'jquery';
import 'bootstrap';

window.$ = window.jQuery = jQuery;
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

