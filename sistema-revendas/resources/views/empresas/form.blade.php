@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label for="nome" class="col-form-label col-sm-6 required">Nome*</label>

        <input value="{{ old('nome', @$empresa->nome) }}" type="text" name="nome" maxlength="255" class="form-control @error('nome') is-invalid @enderror">

        @error('nome')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label col-sm-6" for="razao_social">Razão Social</label>
        <input value="{{ old('razao_social', @$empresa->razao_social) }}" type="text" id="razao_social" name="razao_social" maxlength="255" class="form-control @error('razao_social') is-invalid @enderror">
        @error('razao_social')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label class="col-form-label col-sm-6 required" for="documento">Documento*</label>
        <input value="{{ old('documento', @$empresa->documento) }}" type="text" id="documento" name="documento" maxlength="18" class="cpf_cnpj form-control @error('documento') is-invalid @enderror">
        @error('documento')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label col-sm-6" for="ie_rg">IE/RG</label>
        <input value="{{ old('ie_rg', @$empresa->ie_rg) }}" type="text" id="ie_rg" name="ie_rg" maxlength="12" class="ie_rg form-control @error('ie_rg') is-invalid @enderror">
        @error('ie_rg')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label class="col-form-label col-sm-6 required" for="nome_contato">Nome Contato*</label>
        <input value="{{ old('nome_contato', @$empresa->nome_contato) }}" type="text" id="nome_contato" name="nome_contato" maxlength="255" class="form-control @error('nome_contato') is-invalid @enderror">
        @error('nome_contato')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label class="col-form-label col-sm-6" for="email">Email*</label>
        <input value="{{ old('email', @$empresa->email) }}" type="email" id="email" name="email" maxlength="100" class="form-control @error('email') is-invalid @enderror">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row"> 
    <div class="form-group col-md-6">
        <label class="col-form-label col-sm-6 required" for="celular">Celular*</label>
            <input value="{{ old('celular', @$empresa->celular) }}" type="text" id="celular" name="celular" maxlength="15" class="celular form-control @error('celular') is-invalid @enderror">
            @error('celular')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>

    <div class="form-group col-md-6">
        <label class="col-form-label col-sm-6" for="telefone">Telefone</label>
            <input value="{{ old('telefone', @$empresa->telefone) }}" type="text" id="telefone" name="telefone" maxlength="15" class="phone form-control @error('telefone') is-invalid @enderror">
            @error('telefone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
</div>

<div class="row"> 
    <div class="form-group col-md-4">
        <label class="col-form-label col-sm-6" for="cep">Cep*</label>
            <input value="{{ old('cep', @$empresa->cep) }}" type="text" id="cep" name="cep" maxlength="9" class="cep form-control @error('cep') is-invalid @enderror">
            @error('cep')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-group col-md-4">
        <label class="col-form-label col-sm-6" for="logradouro">Logradouro*</label>
            <input value="{{ old('logradouro', @$empresa->logradouro) }}" type="text" id="logradouro" name="logradouro" maxlength="150" class="form-control @error('logradouro') is-invalid @enderror">
            @error('logradouro')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-group col-md-4">
        <label class="col-form-label col-sm-6" for="bairro">Bairro*</label>
            <input value="{{ old('bairro', @$empresa->bairro) }}" type="text" id="bairro" name="bairro" maxlength="100" class="form-control @error('bairro') is-invalid @enderror">
            @error('bairro')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
</div>

<div class="row"> 
    <div class="form-group col-md-9">
        <label class="col-form-label col-sm-6" for="cidade">Cidade*</label>
            <input value="{{ old('cidade', @$empresa->cidade) }}" type="text" id="cidade" name="cidade" maxlength="100" class="form-control @error('cidade') is-invalid @enderror">
            @error('cidade')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-group col-md-3">
        <label class="col-form-label col-sm-6" for="estado">Estado*</label>
            <select name="estado" class="form-control @error('estado') is-invalid @enderror" required="required">
                <option value="">Selecione</option>
                @foreach(estados() as $sigla => $nome)
                <option {{ @$empresa->estado == $sigla ? 'selected' : '' }} value="{{ $sigla }}">{{ $nome }}</option>
                @endforeach
            </select>
            @error('estado')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-9">
        <label class="col-form-label col-sm-6" for="observacao">Observacao</label>
            <input value="{{ old('observacao', @$empresa->observacao) }}" type="text" id="observacao" name="observacao" maxlength="500" class="form-control @error('observacao') is-invalid @enderror">
            @error('observacao')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
</div>


<button class="btn btn-primary mt-5" name="submit" value="" type="submit">Salvar</button>