(function(api) {

  api.sectionConstructor['bluetone-upsell'] = api.Section.extend({
      attachEvents: function() {},
      isContextuallyActive: function() {
          return true;
      }
  });

  const bluetone_section_lists = ['Main', 'Clients', 'Logo'];
  bluetone_section_lists.forEach(bluetone_homepage_scroll);

  function bluetone_homepage_scroll(item) {
      item = item.replace(/-/g, '_');
      wp.customize.section('bluetone_' + item + '_section', function(section) {
          section.expanded.bind(function(isExpanding) {
              wp.customize.previewer.send(item, { expanded: isExpanding });
          });
      });
  }
})(wp.customize);