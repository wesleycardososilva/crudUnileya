import api from "./api";

export default class LivrosService {
  static async getAll() {
    return await api.get("/livros");
  }
  
  static async delete(id) {
    return await api.delete("/livros/delete/" + id);
  }
  static async add(autor, genero, editora, titulo, ano_de_lancamento) {
    return await api.post("/livros/add",{'autor':autor,'genero':genero, 'editora':editora, 'titulo': titulo, 'ano_de_lancamento': ano_de_lancamento });
  }
  static async get(id) {
    return await api.get("/livros/"+id);
  }
  static async update(id, autor, genero, editora, titulo, ano_de_lancamento) {
    return await api.post("/livros/update/"+id,{'autor':autor,'genero':genero, 'editora':editora, 'titulo': titulo, 'ano_de_lancamento': ano_de_lancamento });
  }
}
