(function(api) {
	api.sectionConstructor['topscene-upsell'] = api.Section.extend({
		attachEvents: function () {},
		isContextuallyActive: function () {
			return true;
		}
	});

	const topsceneSections = ['Intro', 'Features', 'Testimonials'];
	topsceneSections.forEach(topscene_scroll_handler);

	function topscene_scroll_handler(sectionName) {
		const id = sectionName.replace(/-/g, '_');
		wp.customize.section('topscene_' + id + '_section', function (section) {
			section.expanded.bind(function (isExpanded) {
				wp.customize.previewer.send(id, { expanded: isExpanded });
			});
		});
	}
})(wp.customize);
