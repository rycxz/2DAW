class Jugador {
    constructor(name) {
        this.name = name;
        this.resultados = [];
    }

    get nombre() {
        return this.name;
    }

    set puntuacion(puntos) {
        this.resultados.push(puntos);
    }

    get mejorPuntuacion() {
        return (Math.max(...this.resultados));
    }

    get totalPuntos() {
        var puntos = 0;
        for (let p of this.resultados) {
            puntos += p;
        }
        return puntos;
    }

    get algunCero() {
        var cero;
        if (this.resultados.some(elem => elem == 0)) {
            cero = 'Si';
        } else {
            cero = 'No';
        }
        return cero;
    }

    /**
     * Devuelve el número redondeado a 2 decimales
     * @return {Float} Devuelve el total de puntos redondeado a 2 decimales
     */
    get puntuacionMedia() {
        return (this.totalPuntos / this.resultados.length).toFixed(2);
    }
}