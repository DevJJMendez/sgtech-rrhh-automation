import './bootstrap';
import './email-form';

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

import { setupUserModal } from './user-modal';
import { sidebarNavigation } from './sidebar-navigation';

setupUserModal();
sidebarNavigation();

toastr.options = {
  "closeButton": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "timeOut": "3000",
}