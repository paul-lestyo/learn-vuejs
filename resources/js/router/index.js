import Home from '../views/Home';
import About from '../views/About';
import Contact from '../views/Contact';
import NewNote from '../views/notes/Create';
import TableOfNote from '../views/notes/Table';
import ShowNote from '../views/notes/Show';
import EditNote from '../views/notes/Edit';
import Register from '../views/auth/Register';
import Login from '../views/auth/Login';
import Profile from '../views/auth/Profile';

export default {
	mode: 'history',
	linkActiveClass: 'active',
	routes: [
		{
			path: '/',
			name: 'home',
			component: Home
		},
		{
			path: '/login',
			name: 'login', 
			component: Login
		},
		{
			path: '/register',
			name: 'register', 
			component: Register
		},
		{
			path: '/profile',
			name: 'profile', 
			component: Profile
		},
		{
			path: '/about',
			name: 'page.about',
			component: About
		},
		{
			path: '/contact',
			name: 'page.contact',
			component: Contact
		},
		{
			path: '/notes/create',
			name: 'notes.create',
			component: NewNote
		},
		{
			path: '/notes/table',
			name: 'notes.table',
			component: TableOfNote
		},
		{
			path: '/notes:noteSlug/table',
			name: 'notes.show',
			component: ShowNote
		},
		{
			path: '/notes:noteSlug/edit',
			name: 'notes.edit',
			component: EditNote
		}
	]
}