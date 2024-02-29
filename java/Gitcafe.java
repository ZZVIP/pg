package com.github.catvod.spider;

import android.content.Context;

import com.github.catvod.api.AliYun;
import com.github.catvod.crawler.Spider;
import com.github.catvod.net.OkHttp;

import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.List;

import org.json.JSONArray;
import org.json.JSONObject;

public class Gitcafe extends Spider {
    private Push FLD65;
    private String FLD66;

    public Gitcafe() {
        this.FLD66 = "";
    }

    public String detailContent(List ids) {
        try {
            return this.FLD65.detailContent(ids);
        }
        catch(Exception v2) {
            v2.printStackTrace();
            return null;
        }
    }

    public void init(Context context, String extend) {
        try{
            super.init(context, extend);
        }catch (Exception e){
            e.printStackTrace();
        }
        Push v0 = new Push();
        this.FLD65 = v0;
        v0.init(context, extend);
    }

    public String playerContent(String flag, String id, List vipFlags) {
        return this.FLD65.playerContent(flag, id, vipFlags);
    }

    public String searchContent(String key, boolean quick) {
        try {
            LinkedHashMap v0 = new LinkedHashMap();
            v0.put("action", "search");
            v0.put("from", "web");
            v0.put("token", this.getToken());
            v0.put("keyword", key);
            String v8_2 = OkHttp.post("https://gitcafe.net/tool/alipaper/", v0, this.getHeaders()).getBody();
//            String v8_2 = ((Response)v8_1.getResult()).body().string();
//            new JSONArray();
            JSONArray v9 = !v8_2.startsWith("[") || !v8_2.endsWith("]") ? new JSONObject(v8_2).getJSONArray("data") : new JSONArray(v8_2);
            JSONArray v8_3 = new JSONArray();
            JSONObject v0_1 = new JSONObject();
            int v1;
            for(v1 = 0; v1 < v9.length(); ++v1) {
                JSONObject v2 = v9.getJSONObject(v1);
                String v3 = v2.getString("title");
                String v4 = v2.getString("alikey");
                if(!v4.isEmpty()) {
                    String v2_1 = v2.getString("cat");
                    String v4_1 = "https://www.aliyundrive.com/s/" + v4;
//                    if(true || AliYun.get().getShareInfo(v4_1)) {
                    if(true){
                        JSONObject v5 = new JSONObject();
                        v5.put("vod_id", v4_1);
                        v5.put("vod_name", v3);
                        v5.put("vod_pic", "https://www.lgstatic.com/i/image2/M01/15/7E/CgoB5lysLXCADg6ZAABapAHUnQM321.jpg");
                        v5.put("vod_remarks", "√" + v2_1);
                        v8_3.put(v5);
                    }
                }
            }

            v0_1.put("list", v8_3);
            return v0_1.toString();
        }
        catch(Exception v8) {
            v8.printStackTrace();
            return "";
        }
    }

    protected HashMap getHeaders() {
        HashMap v0 = new HashMap();
        v0.put("User-Agent", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.54 Safari/537.36");
        v0.put("Origin", "https://u.gitcafe.net/");
        v0.put("Referer", "https://u.gitcafe.net/");
        return v0;
    }

    private String getToken() {
        try {
            if ((this.FLD66.isEmpty()) || this.FLD66.length() == 0) {
                LinkedHashMap v0 = new LinkedHashMap();
                v0.put("action", "get_token");
                String v1 = OkHttp.post("https://gitcafe.net/tool/alipaper/", v0, this.getHeaders()).getBody();
                this.FLD66 = new JSONObject(v1).getString("data");
            }

            return this.FLD66;
        }catch (Exception e){
            e.printStackTrace();
            return "";
        }
    }
}
