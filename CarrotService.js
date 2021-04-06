self.addEventListener('activate', function(event) {
  var cacheWhitelist = ['dependencies-cache-**v1**', 'dependencies-2-cache-**v1**'];
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

self.addEventListener("install", function(event) {
    event.waitUntil(preLoad());
  });
  
  var preLoad = function(){
    console.log("Installing web app");
    return caches.open("offline").then(function(cache) {
      console.log("caching index and important routes");
      return cache.addAll([
        "/js/jquery.min.js",
        "/assets/css/responsive.min.css",
        "/assets/css/font-awesome.min.css",
        "/images/search.png",
        "/offline.html"
      ]);
    });
  };

  self.addEventListener("fetch", function(event) {
    event.respondWith(checkResponse(event.request).catch(function() {
      return returnFromCache(event.request);
    }));
    event.waitUntil(addToCache(event.request));
  });

  var checkResponse = function(request){
    return new Promise(function(fulfill, reject) {
      fetch(request).then(function(response){
        if(response.status !== 404) {
          fulfill(response);
        } else {
          console.log("o thoi!");
          reject();
        }
      }, reject);
    });
  };

  
  var addToCache = function(request){
    return caches.open("offline").then(function (cache) {
      return fetch(request).then(function (response) {
        //console.log(response.url + " was cached");
        return cache.put(request, response);
      }).catch(function(err) {       // fallback mechanism
        return caches.open("offline")
          .then(function(cache) {
            return cache.match('offline');
          });
      });
    });
  };
  
  var returnFromCache = function(request){
    return caches.open('offline').then(function (cache) {
      return cache.match(request).then(function (matching) {
       if(!matching || matching.status == 404) {
         return cache.match('offline')
       } else {
         return matching
       }
      });
    });
  };