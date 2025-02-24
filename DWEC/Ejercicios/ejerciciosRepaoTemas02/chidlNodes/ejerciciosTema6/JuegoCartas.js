/**
 * Juego de clase Cartas que hereda de la clase "Juego"
 */
class JuegoCartas extends Juego {
    constructor(nombre, jugadores, baraja = 'Española', cartas = 48) {
        // Constructor del padre
        super(nombre, jugadores);

        // Propiedades de la propia clase
        this.t_baraja = baraja;
        this.n_cartas = cartas;
    }

    get baraja() {
        return this.t_baraja;
    }

    get cartas() {
        return this.n_cartas;
    }
}