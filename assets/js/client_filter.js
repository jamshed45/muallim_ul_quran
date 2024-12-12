
    document.getElementById('clientSelect').addEventListener('change', function() {
        var clientId = this.value;
        if (clientId) {
            var url = new URL(window.location.href);
            url.searchParams.set('client_id', clientId);
            window.location.href = url.toString();
        }
    });

    document.getElementById('resetButton').addEventListener('click', function() {
        var url = new URL(window.location.href);
        url.search = '';
        window.location.href = url.toString();
    });

