/**
 * Juego de clase Dados que hereda de la clase "Juego"
 */
class JuegoDados extends Juego {
    constructor(nombre, jugadores, dados, cantidad = 2) {
        // Constructor del padre
        super(nombre, jugadores);

        // Propiedades de la propia clase
        this.n_dados = dados;
        this.t_cantidad = cantidad;
    }

    get dados() {
        return this.n_dados;
    }

    get cantidad() {
        return this.t_cantidad;
    }
}