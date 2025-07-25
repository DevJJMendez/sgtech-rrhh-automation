<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de contratación</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="form-container">
        <p class="form-note"><span class="">*</span> Campos obligatorios</p>
        <form action="{{ route('hiring.post') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <fieldset class="form-section">
                <legend>Datos Personales</legend>
                {{-- Hiring Date - Job Position --}}
                <div class="input-row">
                    <input type="hidden" name="invitation_uuid" value="{{ $invitation->uuid }}">
                    <div class="input-group input-small">
                        <label for="hiring_date">Fecha de ingreso <span>*</span></label>
                        <input type="date" name="hiring_date" value="{{ old('hiring_date') }}">
                        @error('hiring_date')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="job_position">Cargo / Especialidad <span>*</span></label>
                        <input type="text" name="job_position" value="{{ old('job_position') }}">
                        @error('job_position')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{-- DNI - Date of Issue - Place of Issue --}}
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="dni">Número de cédula <span>*</span></label>
                        <input type="number" name="dni" value="{{ old('dni') }}">
                        @error('dni')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="date_of_issue">Fecha de expedición <span>*</span></label>
                        <input type="date" name="date_of_issue" value="{{ old('date_of_issue') }}">
                        @error('date_of_issue')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="place_of_issue">Lugar de expedición <span>*</span></label>
                        <input type="text" id="place_of_issue" name="place_of_issue"
                            value="{{ old('place_of_issue') }}">
                        @error('place_of_issue')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{-- First Name - Second Name --}}
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="first_name">Nombre <span>*</span></label>
                        <input type="text" name="first_name" placeholder="Ej. Juan" value="{{ old('first_name') }}">
                        @error('first_name')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="middle_name">Segundo Nombre</label>
                        <input type="text" name="middle_name" placeholder="Ej. Carlos"
                            value="{{ old('middle_name') }}">
                        @error('middle_name')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{-- Last Name - Second Last Name --}}
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="last_name">Apellido <span>*</span></label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}">
                        @error('last_name')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="second_last_name">Segundo Apellido</label>
                        <input type="text" name="second_last_name" value="{{ old('second_last_name') }}">
                        @error('second_last_name')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{-- Blood Group - Marital Status - Gender --}}
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="blood_group">Grupo Sanguíneo y RH <span>*</span></label>
                        <select name="blood_group">
                            <option value="">Seleccione</option>
                            <option value="A+" {{ old('blood_group') === 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ old('blood_group') === 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ old('blood_group') === 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ old('blood_group') === 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB+" {{ old('blood_group') === 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ old('blood_group') === 'AB-' ? 'selected' : '' }}>AB-</option>
                            <option value="O+" {{ old('blood_group') === 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ old('blood_group') === 'O-' ? 'selected' : '' }}>O-</option>
                        </select>
                        @error('blood_group')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="marital_status">Estado Civil <span>*</span></label>
                        <select name="marital_status">
                            <option value="">Seleccione</option>
                            <option value="soltero" {{ old('marital_status') === 'soltero' ? 'selected' : '' }}>
                                Soltero
                            </option>
                            <option value="casado" {{ old('marital_status') === 'casado' ? 'selected' : '' }}>
                                Casado
                            </option>
                            <option value="divorciado" {{ old('marital_status') === 'divorciado' ? 'selected' : '' }}>
                                Divorciado
                            </option>
                            <option value="viudo" {{ old('marital_status') === 'viudo' ? 'selected' : '' }}>
                                Viudo
                            </option>
                        </select>
                        @error('marital_status')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="gender">Sexo <span>*</span></label>
                        <select id="gender" name="gender">
                            <option value="">Seleccione</option>
                            <option value="masculino" {{ old('gender') === 'masculino' ? 'selected' : '' }}>
                                Masculino
                            </option>
                            <option value="femenino" {{ old('gender') === 'femenino' ? 'selected' : '' }}>
                                Femenino
                            </option>
                        </select>
                        @error('gender')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- Birthdate - Place of Birth - nationality --}}
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="birthdate">Fecha Nacimiento <span>*</span></label>
                        <input type="date" name="birthdate" value="{{ old('birthdate') }}">
                        @error('birthdate')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="place_of_birth">Lugar De Nacimiento <span>*</span></label>
                        <input type="text" name="place_of_birth" value="{{ old('place_of_birth') }}">
                        @error('place_of_birth')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="nationality">Nacionalidad <span>*</span></label>
                        <input type="text" name="nationality" value="{{ old('nationality') }}">
                        @error('nationality')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{-- address - phone_number - cellphone_number - email --}}
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="address">Dirección <span>*</span></label>
                        <input type="text" name="address" value="{{ old('address') }}">
                        @error('address')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="phone_number">Teléfono <span>*</span></label>
                        <input type="text" name="phone_number" value="{{ old('phone_number') }}">
                        @error('phone_number')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="cellphone_number">Celular <span>*</span></label>
                        <input type="text" name="cellphone_number" value="{{ old('cellphone_number') }}">
                        @error('cellphone_number')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="email">Correo electrónico <span>*</span></label>
                        <input type="text" name="email" value="{{ old('email') }}">
                        @error('email')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-section">
                <legend>Datos Bancarios</legend>
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="banking_entity">Entidad bancaria <span>*</span></label>
                        <input type="text" name="banking_entity" value="{{ old('banking_entity') }}">
                        @error('banking_entity')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="account_number">Número de cuenta <span>*</span></label>
                        <input type="text" name="account_number" value="{{ old('account_number') }}">
                        @error('account_number')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="account_type">Tipo de cuenta <span>*</span></label>
                        <select name="account_type" id="account_type">
                            <option value="">Seleccione</option>
                            <option value="corriente" {{ old('account_type') === 'corriente' ? 'selected' : '' }}>
                                Corriente
                            </option>
                            <option value="ahorros" {{ old('account_type') === 'ahorros' ? 'selected' : '' }}>
                                Ahorros
                            </option>
                            <option value="nomina" {{ old('account_type') === 'nomina' ? 'selected' : '' }}>
                                Nómina
                            </option>
                        </select>
                        @error('account_type')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-section">
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="eps">EPS <span>*</span></label>
                        <input type="text" id="eps" name="eps" value="{{ old('eps') }}">
                        @error('eps')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="pension_fund">Fondo de pensiones</label>
                        <input type="text" id="pension_fund" name="pension_fund"
                            value="{{ old('pension_fund') }}">
                        @error('pension_fund')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="severance_pay_fund">Fondo de cesantías</label>
                        <input type="text" name="severance_pay_fund" value="{{ old('severance_pay_fund') }}">
                        @error('severance_pay_fund')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </fieldset>
            {{-- family data --}}
            <fieldset class="form-section">
                <legend>Datos familiares</legend>
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="relationship">Parentesco <span>*</span></label>
                        <input type="text" name="relationship" value="{{ old('relationship') }}">
                        @error('relationship')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="family_data_dni">Número de cédula <span>*</span></label>
                        <input type="number" name="family_data_dni" value="{{ old('family_data_dni') }}">
                        @error('family_data_dni')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="full_name">Nombre y Apellido <span>*</span></label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}">
                        @error('full_name')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="age">Edad <span>*</span></label>
                        <input type="number" name="age" value="{{ old('age') }}">
                        @error('age')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="family_data_gender">Sexo <span>*</span></label>
                        <select name="family_data_gender">
                            <option value="">Seleccione</option>
                            <option value="masculino"
                                {{ old('family_data_gender') === 'masculino' ? 'selected' : '' }}>
                                Masculino</option>
                            <option value="femenino" {{ old('family_data_gender') === 'femenino' ? 'selected' : '' }}>
                                Femenino
                            </option>
                        </select>
                        @error('gender')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="family_data_birthdate">Fecha de nacimiento <span>*</span></label>
                        <input type="date" name="family_data_birthdate"
                            value="{{ old('family_data_birthdate') }}">
                        @error('family_data_birthdate')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </fieldset>
            {{-- medical data --}}
            <fieldset class="form-section">
                <legend>Datos médicos</legend>
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="allergies">Alergias</label>
                        <input type="text" name="allergies" value="{{ old('allergies') }}">
                        @error('allergies')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="diseases">Enfermedades</label>
                        <input type="text" name="diseases" value="{{ old('diseases') }}">
                        @error('diseases')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="medications">Medicamentos</label>
                        <input type="text" name="medications" value="{{ old('medications') }}">
                        @error('medications')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="additional_information">Información adicional que considere importante en
                            relación
                            con su salud:
                        </label>
                        <textarea name="additional_information">{{ old('additional_information') }}</textarea>
                    </div>
                </div>
            </fieldset>
            {{-- emergency contact --}}
            <fieldset class="form-section">
                <legend>En caso de emergencia llamar a:</legend>
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="emergency_contact_full_name">Nombre y Apellido</label>
                        <input type="text" name="emergency_contact_full_name"
                            value="{{ old('emergency_contact_full_name') }}">
                        @error('emergency_contact_full_name')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="emergency_contact_phone_number">Telefono / Celular</label>
                        <input type="text" name="emergency_contact_phone_number"
                            value="{{ old('emergency_contact_phone_number') }}">
                        @error('emergency_contact_phone_number')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="emergency_contact_relationship">Parentesco</label>
                        <input type="text" name="emergency_contact_relationship"
                            value="{{ old('emergency_contact_relationship') }}">
                        @error('emergency_contact_relationship')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </fieldset>
            {{-- additional information --}}
            <fieldset class="form-section">
                <legend>Información Académica</legend>
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="academic_institution">Institución <span>*</span></label>
                        <input type="text" name="academic_institution" value="{{ old('academic_institution') }}"
                            placeholder="SENA / Universidad">
                        @error('academic_institution')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="start_date">Fecha de inicio <span>*</span></label>
                        <input type="date" name="start_date" value="{{ old('start_date') }}">
                        @error('start_date')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="end_date">Fecha fin <span>*</span></label>
                        <input type="date" name="end_date" value="{{ old('end_date') }}">
                        @error('end_date')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="university_career">Carrera</label>
                        <input type="text" name="university_career" value="{{ old('university_career') }}">
                        @error('university_career')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="degree">Grado <span>*</span></label>
                        <input type="text" name="degree" value="{{ old('degree') }}"
                            placeholder="Técnico / Tecnólogo / Profesional">
                        @error('degree')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="input-group input-small">
                        <label for="card_number">Numero de Tarjeta profesional</label>
                        <input type="text" id="card_number" name="card_number"
                            value="{{ old('card_number') }}">
                        @error('card_number')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <fieldset class="form-section">
                    <legend>Especialidad</legend>
                    <div class="input-row">
                        <div class="input-group input-small">
                            <label for="specialty_academic_institution">Institución</label>
                            <input type="text" name="specialty_academic_institution"
                                value="{{ old('specialty_academic_institution') }}">
                            @error('specialty_academic_institution')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group input-small">
                            <label for="specialty_start_date">Fecha de inicio</label>
                            <input type="date" name="specialty_start_date"
                                value="{{ old('specialty_start_date') }}">
                            @error('specialty_start_date')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group input-small">
                            <label for="specialty_end_date">Fecha fin</label>
                            <input type="date" name="specialty_end_date"
                                value="{{ old('specialty_end_date') }}">
                            @error('specialty_end_date')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group input-small">
                            <label for="course">Curso</label>
                            <input type="text" name="course" value="{{ old('course') }}">
                            @error('course')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group input-small">
                            <label for="specialty_level">Nivel alcanzado</label>
                            <input type="text" id="level" name="specialty_level"
                                value="{{ old('specialty_level') }}">
                            @error('specialty_level')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-section">
                    <legend>Conocimientos en metodologías / Herramientas IT / Idiomas</legend>
                    <div class="input-row">
                        <div class="input-group input-small">
                            <label for="technology">Herramienta y/o tecnologia</label>
                            <input type="text" id="technology" name="technology"
                                value="{{ old('technology') }}">
                            @error('technology')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group input-small">
                            <label for="knowledge_level">Nivel alcanzado</label>
                            <select name="knowledge_level">
                                <option value="">Seleccione</option>
                                <option value="basico" {{ old('knowledge_level') === 'basico' ? 'selected' : '' }}>
                                    Básico
                                </option>
                                <option value="intermedio"
                                    {{ old('knowledge_level') === 'intermedio' ? 'selected' : '' }}>
                                    Intermedio</option>
                                <option value="avanzado"
                                    {{ old('knowledge_level') === 'avanzado' ? 'selected' : '' }}>
                                    Avanzado
                                </option>
                            </select>
                            @error('knowledge_level')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group input-small">
                            <label for="languages">Idioma</label>
                            <input type="text" id="languages" name="languages" value="{{ old('languages') }}">
                            @error('languages')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group input-small">
                            <label for="language_level">Nivel alcanzado</label>
                            <select name="language_level">
                                <option value="">Seleccione</option>
                                <option value="A1"{{ old('language_level') === 'A1' ? 'selected' : '' }}>
                                    A1</option>
                                <option value="A2"{{ old('language_level') === 'A2' ? 'selected' : '' }}>
                                    A2
                                </option>
                                <option value="B1"{{ old('language_level') === 'B1' ? 'selected' : '' }}>
                                    B1
                                </option>
                                <option value="B2"{{ old('language_level') === 'B2' ? 'selected' : '' }}>
                                    B2
                                </option>
                                <option value="C1"{{ old('language_level') === 'C1' ? 'selected' : '' }}>
                                    C1
                                </option>
                                <option value="C2"{{ old('language_level') === 'C2' ? 'selected' : '' }}>
                                    C2
                                </option>
                            </select>
                            @error('language_level')
                                <small class="error-message">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </fieldset>
                @if ($invitation->collaboratorRole->name === 'Freelancer')
                    <input type="hidden" name="role" value="{{ $invitation->collaboratorRole->name }}">
                    @include('components.freelancer-files-form')
                @elseif ($invitation->collaboratorRole->name === 'Aprendiz')
                    <input type="hidden" name="role" value="{{ $invitation->collaboratorRole->name }}">
                    {{ $invitation->collaboratorRole->name }}
                    @include('components.aprendiz-files-form')
                @elseif ($invitation->collaboratorRole->name === 'Colaborador')
                    <input type="hidden" name="role" value="{{ $invitation->collaboratorRole->name }}">
                    {{ $invitation->collaboratorRole->name }}
                    @include('components.colaborador-files-form')
                @endif
            </fieldset>
            <button type="submit" class="btn-submit-form">Enviar</button>
        </form>
    </div>
</body>

</html>
