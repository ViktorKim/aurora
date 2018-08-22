(function () {
    'use strict';
    /**
     * Form submit Event
     */
    var _runBtn = document.getElementById('action-btn');
    var _stopBtn = document.getElementById('stop-ping-btn');


    document.getElementById('checker-form').addEventListener('submit', function (ev) {
        ev.preventDefault();

        var _formData = new FormData(this);
        var _interval = document.getElementById('ping-interval').value*1000;


        _stopBtn.style.display = 'inline-block';
        _stopBtn.setAttribute('data-stopped', 'false');

        _runBtn.style.display = 'none';

        var counter = 0;
        var timerId = setTimeout(function _runAgain(){

            console.log('iteration ' + ++counter);
            console.log(_interval);

            sendRequest(_formData);

            if (_stopBtn.getAttribute('data-stopped') === 'true'){
                clearTimeout (timerId);

                _runBtn.style.display = 'inline-block';

                _stopBtn.style.display = 'none';
                _stopBtn.innerHTML = 'Stop';
                _stopBtn.disabled = false;

                return;
            }

            timerId = setTimeout(_runAgain, _interval);

        }, _interval);

    });

    /**
     * Stop btn event
     */
    _stopBtn.addEventListener('click', function (ev) {
        ev.preventDefault();
        this.setAttribute('data-stopped', 'true');
        this.innerHTML = 'Stopping...';
        this.disabled = true;
    });

    /**
     * Send form data with ajax
     *
     * @param data
     */
    function sendRequest(data) {

        var _xhr = new XMLHttpRequest();
        _xhr.open('POST', 'ajax.php', false);
        _xhr.send(data);

        _xhr.onreadystatechange = function() { // (3)
            if (_xhr.readyState != 4) return;
            if (_xhr.status != 200) {
                console.log(_xhr.status + ': ' + _xhr.statusText);
            } else {
                console.log(_xhr.responseText);
            }
        };
    }
}());