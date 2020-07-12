@csrf
<div class="form-group">
<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ @old('name') ?? $client->name }}" placeholder="Inserer votre name">
    <div class="invalid-feedback">
    {{ $errors->first('name') }}
    </div>
</div>

<div class="form-group">
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ @old('email') ?? $client->email ?? '' }}" placeholder="Inserer votre email">
    <div class="invalid-feedback">
    {{ $errors->first('email') }}
    </div>
</div>

<div class="form-group">
    <select class="custom-select @error('status') is-invalid @enderror" name="status" >
        <option value="">Choisir un status</option>
        @foreach ( $client->getStatusOptions() as $key => $value )
        <option value="{{ $key }}" {{  $client->status  == $value ? 'selected' : '' }} >{{ $value }}</option>
        @endforeach
    </select>
    <div class="invalid-feedback">
    {{ $errors->first('status') }}
    </div>
</div>

<div class="form-group">
    <select class="custom-select @error('entreprise_id') is-invalid @enderror" name="entreprise_id">
        <option value="">Choisir une entreprise</option>
        @foreach ($entreprises as $entreprise)
        <option value="{{ $entreprise->id }}" {{  $client->entreprise_id  == $entreprise->id ? 'selected' : '' }}>
            {{ $entreprise->name }}
        </option>
        @endforeach
    </select>
    <div class="invalid-feedback">
    {{ $errors->first('entreprise_id') }}
    </div>
</div>

<div class="form-group">
    <div class="custom-file">
        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror">
        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
    </div>
</div>
