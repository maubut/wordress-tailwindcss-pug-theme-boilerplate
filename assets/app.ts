class App {
  static start() {
    return new App();
  }

  constructor() {
    Promise.all([App.domReady()]).then(this.init.bind(this));
  }

  static domReady() {
    return new Promise((resolve) => {
      document.addEventListener('DOMContentLoaded', resolve);
    });
  }

  init() {
    console.info('🚀App:init');
  }
}

document.documentElement.classList.remove('has-no-js');
document.documentElement.classList.add('has-js');
document.documentElement.classList.add('dom-is-loading');

App.start();

export default App;