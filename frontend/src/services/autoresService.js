import api from "./api";

export default class AutoresService {
  static async getAll() {
    return await api.get("/autores");
  }
  
  static async delete(id) {
    return await api.delete("/autores/delete/" + id);
  }
  static async add(nome,ano_de_nascimento, sexo, nacionalidade) {
    return await api.post("/autores/add",{'nome':nome,'ano_de_nascimento':ano_de_nascimento,'sexo':sexo,'nacionalidade':nacionalidade });
  }
  static async get(id) {
    return await api.get("/autores/"+id);
  }
  static async update(id, nome, ano_de_nascimento, sexo, nacionalidade) {
    return await api.post("/autores/update",{'nome':nome,'ano_de_nascimento':ano_de_nascimento,'sexo':sexo,'nacionalidade':nacionalidade });
  }
}
