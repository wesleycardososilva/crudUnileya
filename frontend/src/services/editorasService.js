import api from "./api";

export default class EditorasService {
  static async getAll() {
    return await api.get("/editoras");
  }
  
  static async delete(id) {
    return await api.delete("/editoras/delete/" + id);
  }
  static async add(data) {
    return await api.post("/editoras/add",{'nome':data});
  }
  static async get(id) {
    return await api.get("/editoras/"+id);
  }
  static async update(id, nome) {
    return await api.post("/editoras/update/"+id,{'nome':nome});
  }
}
