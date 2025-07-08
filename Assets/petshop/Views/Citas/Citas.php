    <?=headerCliente();?>
    <?=navCliente();?>

   
    <link href="assets/css/estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

    <!-- <section id="contact" class="contact">
    <div class="container" data-aos="fade-up"> -->
        <br><br> <br><br>
<div class="iner">
       
    <div class="er">
            <div class="section-header">
            <h1>RESERVACIÓN DE CITA</h1>
            <p>Dr.Antony</p>
            </div>

            <label for="fechaHora">Fecha y Hora de la Cita:</label>
                <input type="text" id="fechaHora" name="fechaHora" readonly required>
                <div id="horaSuggestions" class="hora-suggestions">
                    <button type="button" class="suggestion" data-time="09:00">09:00</button>
                    <button type="button" class="suggestion" data-time="10:00">10:00</button>
                    <button type="button" class="suggestion" data-time="11:00">11:00</button>
                    <button type="button" class="suggestion" data-time="12:00">12:00</button>
                    <button type="button" class="suggestion" data-time="13:00">13:00</button>
                    <button type="button" class="suggestion" data-time="14:00">14:00</button>
                    <button type="button" class="suggestion" data-time="15:00">15:00</button>
                    <button type="button" class="suggestion" data-time="16:00">16:00</button>
                    <p>*Horario de acuerdo a los días de disponibilidad</p>
                </div>
              
            
          
            
            <label for="mascota">Nombre de la Mascota:</label>
            <input type="text" id="mascota" name="mascota" required>
            
            <label for="tipo-mascota">Tipo de Mascota:</label>
            <select id="tipo-mascota" name="tipo-mascota" required>
                <option value=""></option>
                <option value="perro">Perro</option>
                <option value="conejo">Conejo</option>
                <option value="gato">Gato</option>
                <option value="otro">Otro</option>
            </select>
            
            <label for="raza">Raza de la Mascota:</label>
            <input type="text" id="raza" name="raza">
            
            <label for="edad">Edad de la Mascota:</label>
            <input type="number" id="edad" name="edad" min="0" required>
            
            <!-- <fieldset>
                <legend>Servicios Requeridos:</legend>
                <input type="checkbox" name="servicios[]" value="Corte de uñas"> Corte de uñas</label>
                <input type="checkbox" name="servicios[]" value="Revisión-consultorio"> Revisión en Consultorio</label>
                <input type="checkbox" name="servicios[]" value="Cirujia">Cirujias</label>
                <input type="checkbox" name="servicios[]" value="Revisión-domiciliaria"> Revisión Domiciliaria</label>
                <input type="checkbox" name="servicios[]" value="Vacunación"> Vacunación</label>
                <input type="checkbox" name="servicios[]" value="Consulta-nutricional"> Consulta Nutricional</label>
            </fieldset> -->

            <label for="tipo-mascota">Categoria</label>
            <select id="tipo-mascota" name="tipo-mascota" required>
                <option value=""></option>
                <option value="perro">Corte de uñas</option>
                <option value="conejo">Revisión en consultorio</option>
                <option value="gato">Cirujia</option>
                <option value="otro">Revisión Domiciliaria</option>
                <option value="otro">Vacunación</option>
                <option value="otro">Consulta Nutricional</option>
            </select>
            
            <label for="comentarios">Motivo de consulta:</label>
            <textarea id="comentarios" name="comentarios" rows="4"></textarea>
            
            <button type="submit">Reservar Cita</button>
        
    </div>
   

<!-- Contenedor principal -->
<div class="grid-container">
    <!-- SEGUNDO CONTENEDOR -->
    <div class="er-side">
        <!-- Contenido adicional -->
        <div class="section-header">
            
            <p>DOCUMETOS A TENER EN CUENTA</p>
        </div>
       <ul>
            <li>Cartilla o carné de vacunación de la mascota.</li>
            <li>Documento de identidad del propietario.</li>
            <li>Historial médico o recetas previas, si las hubiera.</li>
        </ul>
    </div>

    <!-- TERCER CONTENEDOR -->
    <div class="er-side">
        <!-- Contenido adicional -->
        <div class="section-header">
            
            <p>RECOMENDACIONES</p>
        </div>
       <ul>
            <li>Llegar al menos 10&nbsp;minutos antes de la cita.</li>
            <li>Mantener a la mascota con correa o en transportadora.</li>
            <li>Evitar alimentar a la mascota un par de horas antes.</li>
            <li>Anotar cualquier síntoma o duda para consultarlo.</li>
        </ul>
    </div>
</div>


        


</div> 

  
    <script>
            // Inicializar el calendario en el campo de fecha
            flatpickr("#fecha", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
                minDate: "today",
                locale: "es"
                
            });
            // Inicializar el selector de hora en el campo de hora y abrirlo automáticamente
            const fpHora = flatpickr("#hora", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                locale: "es"
                
            });
        </script>
        <script>
            // Inicializar el calendario
            flatpickr("#fechaHora", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: true,
                locale: "es", // Establecer el idioma a español
                onReady: function(dateObj, dateStr, instance) {
                    instance.open();  // Abre el calendario automáticamente
                },
                onChange: function(selectedDates, dateStr, instance) {
                    const selectedDate = selectedDates[0];
                    const formattedDate = flatpickr.formatDate(selectedDate, "Y-m-d");
                    document.querySelectorAll('.suggestion').forEach(button => {
                        button.addEventListener('click', function() {
                            const selectedTime = this.getAttribute('data-time');
                            document.getElementById('fechaHora').value = `${formattedDate} ${selectedTime}`;
                        });
                    });
                }
            });
        </script>
    


   <br>

    <?=footerCliente();?>

