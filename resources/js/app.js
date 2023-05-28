window.Fusion.booting(function(Vue, router, store) {
    // Vue.component('contact-form-fieldtype', () => import('./components/Fieldtypes/ContactForm/Field'))
    
	router.addRoutes([
		{
			path: '/contact-form',
            component: () => import('./pages/Index'),
            name: 'contact_form',
            meta: {
                requiresAuth: true,
                layout: 'admin'
            }
		},
	])
})

window.addEventListener('DOMContentLoaded', function () {
})
