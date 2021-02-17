import api from "./api";

export default class GenerosService {
  static async getAll() {
    return await api.get("/generos");
  }
  
  static async delete(id) {
    return await api.delete("/generos/delete/" + id);
  }
  static async add(data) {
    return await api.post("/generos/add",{'nome':data});
  }
  static async get(id) {
    return await api.get("/generos/"+id);
  }
  static async update(id, nome) {
    return await api.post("/generos/update/"+id,{'nome':nome});
  }
}


