<div class="col-md-3">
    @if(auth()->check() && (auth()->user()->hasRole('Super Admin')))
    <div class="d-flex align-items-center">
        @php
            $clients = get_clients_filter();
        @endphp
        <select class="form-control me-2" name="client_id" id="clientSelect" required>
            <option value="" disabled selected>Select a client</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ $client_id == $client->id ? 'selected' : '' }}>
                    {{ $client->name }}
                </option>
            @endforeach
        </select>

        <button type="button" class="btn btn-secondary" id="resetButton">Reset</button>
    </div>
    @endif
</div>

