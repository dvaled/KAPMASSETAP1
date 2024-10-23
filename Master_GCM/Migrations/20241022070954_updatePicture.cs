using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class updatePicture : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_TRN_HIST_MAINTENANCE_TRN_ASSET_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_PICTURE_ASSETCODE",
                table: "TRN_DTL_PICTURE");

            migrationBuilder.AlterColumn<string>(
                name: "ASSETCODE",
                table: "TRN_HIST_MAINTENANCE",
                type: "text",
                nullable: false,
                defaultValue: "",
                oldClrType: typeof(string),
                oldType: "text",
                oldNullable: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_PICTURE_ASSETCODE",
                table: "TRN_DTL_PICTURE",
                column: "ASSETCODE");

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_HIST_MAINTENANCE_TRN_ASSET_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE",
                column: "ASSETCODE",
                principalTable: "TRN_ASSET",
                principalColumn: "ASSETCODE",
                onDelete: ReferentialAction.Cascade);
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_TRN_HIST_MAINTENANCE_TRN_ASSET_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_PICTURE_ASSETCODE",
                table: "TRN_DTL_PICTURE");

            migrationBuilder.AlterColumn<string>(
                name: "ASSETCODE",
                table: "TRN_HIST_MAINTENANCE",
                type: "text",
                nullable: true,
                oldClrType: typeof(string),
                oldType: "text");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_PICTURE_ASSETCODE",
                table: "TRN_DTL_PICTURE",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_HIST_MAINTENANCE_TRN_ASSET_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE",
                column: "ASSETCODE",
                principalTable: "TRN_ASSET",
                principalColumn: "ASSETCODE");
        }
    }
}
