const JSLogger = function (settings) {
  settings = settings || {};
  this.settings = settings;
  window.onerror = JSLogger.log;
  if (!(this instanceof JSLogger)) return new JSLogger(settings);
};

JSLogger.version = '0.0.1';

JSLogger.log = function (errorMsg, fileUrl, lineNumber, columnNumber) {
  if (typeof this.settings.url === 'undefined')
    throw new Error('JSLogger - You must set the url in the settings.');
  const data = {
    errorMsg,
    fileUrl,
    lineNumber,
    columnNumber,
  };
  const string = JSON.stringify(data);
  if (window.XMLHttpRequest) {
    var x = new XMLHttpRequest();
  } else {
    var x = new ActiveXObject('Microsoft.XMLHTTP');
  }
  x.open('POST', this.settings.url, true);
  x.setRequestHeader('Content-type', 'application/json');
  x.setRequestHeader('Content-length', string.length);
  x.setRequestHeader('Connection', 'close');
  x.send(data);
};
