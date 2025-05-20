<x-layout>
    <x-slot:title>Contactanos</x-slot:title>
    <section class="contacto">
        <div class="container">
            <h2>Contactanos</h2>
            <p>¿Tenés dudas, sugerencias o querés unirte al desarrollo? Escribinos.</p>

            <form action="#" method="get">
                @csrf
                <div class="form-group">
                    <label for="nombreCont">Nombre</label>
                    <input type="text" id="nombreCont" name="nombreCont">
                </div>
                <div class="form-group">
                    <label for="emailCont">Correo Electrónico <span class="small">*</span> </label>
                    <input type="email" id="emailCont" name="emailCont">
                </div>
                <div class="form-group">
                    <label for="mensajeCont">Mensaje <span class="small">*</span> </label>
                    <textarea id="mensajeCont" name="mensajeCont" rows="5"></textarea>
                </div>
                <button class="btnVerd" type="submit">Enviar Mensaje</button>
            </form>
        </div>
    </section>

</x-layout>