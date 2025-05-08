function navigateTo(page) {
    const pages = {
      home: "index.html",
      profile: "profile.html",
      suggestions: "suggestions.html",
      settings: "settings.html"
    };
    window.location.href = pages[page];
  }