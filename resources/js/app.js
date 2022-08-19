import { createApp, h } from "vue";
import { createInertiaApp, Link, Head } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import Layout from "./Shared/Layout";
import Adminlauout from "./Shared/Adminlauout";
import Guestlayout from "./Shared/Guestlayout";

createInertiaApp({
  resolve: name => {
    let page = require(`./Pages/${name}`).default;

    if (page.layout === undefined) {
      page.layout = Layout;
    }else if (page.layout === 'admin') {
      page.layout = Adminlauout;
    }else if (page.layout === 'guest') {
      page.layout = Guestlayout;
    } else {}

    return page;
  },

  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Link", Link)
      .component("Head", Head)
      .mount(el);
  },

  title: title => `Belva- ${title}`
});

InertiaProgress.init({
  color: "red",
  showSpinner: true,
});
