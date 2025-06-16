{{--   --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/register.css')
    @notifyCss
</head>

<body>
    <div class="form-container">
        <form action="{{ route('hiring.post') }}" method="POST">
            @csrf
            <fieldset class="form-section">
                <legend>Documentación requerida</legend>
                {{-- Hiring Date - Job Position --}}
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="cedula">Fotocopia de la cédula de ciudadanía ampliada al 150%</label>
                        <input type="file" name="cedula" value="{{ old('') }}" accept=".pdf,.jpg">
                        @error('')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="certificación-eps">Certificación de afiliación a EPS</label>
                        <input type="file" name="certificación-eps" value="{{ old('') }}" accept=".pdf,.jpg">
                        @error('')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="certificación-bancaria">Certificación bancaria</label>
                        <input type="file" name="certificación-bancaria" value="{{ old('') }}"
                            accept=".pdf,.jpg">
                        @error('')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="documento-antecendetes">Antecedentes policía, procuraduría y contraloría (bajar de
                            internet)
                            (PDF)</label>
                        <input type="file" name="documento-antecendetes" value="{{ old('') }}"
                            accept=".pdf,.jpg">
                        @error('')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="foto">Fotografía para la firma de correo</label>
                        <input type="file" name="foto" value="{{ old('') }}" accept=".pdf,.jpg">
                        @error('')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <button type="submit" class="btn-submit-form">Enviar</button>
        </form>
    </div>
    <x-notify::notify />
    @notifyJs
</body>

</html>
