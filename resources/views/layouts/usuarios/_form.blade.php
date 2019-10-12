<div class="input-field">
  <input type="text" name="nome" value="{{ isset($registro->nome) ? $registro->nome : ''}}">
  <label>Nome</label>
</div>

<div class="input-field">
  <input type="text" name="usuario" value="{{ isset($registro->usuario) ? $registro->usuario : ''}}">
  <label>Usuario</label>
</div>

<div class="input-field">
  <input type="text" name="senha" value="{{ isset($registro->senha) ? $registro->senha : ''}}">
  <label>Senha</label>
</div>

<div class="input-field">
  <input type="text" name="nascimento" value="{{ isset($registro->nascimento) ? $registro->nascimento : ''}}">
  <label>Nascimento</label>
</div>

<div class="file-field input-field">
  <buton class="btn blue">
    <span>Imagem</span>
    <input type="file" name="imagem" value="">
  </buton>

  <div class="file-path-wrapper">
    <input class="file-path validate" type="text">
  </div>
</div>

@if(isset($registro->imagem))
  <div class="input-field">
    <img width="120" src="{{ asset($registro->imagem) }}" >
  </div>
@endif

<div class="input-field">
  <p>
    <label>
      <input class="with-gap" name="tipo-conta" type="radio" value="fisica" {{ isset($registro->tipo_conta) && $registro->tipo_conta == 'fisica' ? 'checked' : '' }} />
      <span>Pessoa Fisica</span>
    </label>
  </p>
  <p>
    <label>
      <input class="with-gap" name="tipo-conta" type="radio" value="juridica" {{ isset($registro->tipo_conta) && $registro->tipo_conta == 'juridica' ? 'checked' : '' }} />
      <span>Pessoa Juridica (Ong)</span>
    </label>
  </p>
  <br><br>
</div>
